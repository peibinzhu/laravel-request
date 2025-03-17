<?php

declare(strict_types=1);

namespace PeibinLaravel\Request;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request as IlluminateRequest;
use Illuminate\Routing\Redirector;
use Illuminate\Support\ServiceProvider;
use Laravel\Octane\Events\RequestReceived;
use PeibinLaravel\Context\Context;
use PeibinLaravel\Di\ReflectionManager;
use PeibinLaravel\Request\Listeners\RequestReceivedListener;

class RequestServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $dependencies = [
            RequestProxy::class      => RequestProxy::class,
            IlluminateRequest::class => RequestProxy::class,
        ];
        $this->registerDependencies($dependencies);

        $listeners = [
            RequestReceived::class => RequestReceivedListener::class,
        ];
        $this->registerlisteners($listeners);

        // Reset the resolvingCallbacks configuration through reflection and rewrite the FormRequest parsing callback.
        $appInstance = $this->app;
        $reflectProperty = ReflectionManager::reflectProperty(get_class($appInstance), 'resolvingCallbacks');
        $reflectProperty->setAccessible(true);
        $resolvingCallbacks = $reflectProperty->getValue($appInstance);

        $resolvingCallbacks[FormRequest::class] = $resolvingCallbacks[FormRequest::class] ?? [];
        if ($resolvingCallbacks[FormRequest::class]) {
            array_shift($resolvingCallbacks[FormRequest::class]);
        }

        $newResolvingCallback = function ($request, $app) {
            $from = Context::get(IlluminateRequest::class) ?: $app['request'];
            $request = FormRequest::createFrom($from, $request);

            $request->setContainer($app)->setRedirector($app->make(Redirector::class));
        };
        array_unshift($resolvingCallbacks[FormRequest::class], $newResolvingCallback);

        $reflectProperty->setValue($appInstance, $resolvingCallbacks);
    }

    private function registerDependencies(array $dependencies): void
    {
        $config = $this->app->get(Repository::class);
        foreach ($dependencies as $abstract => $concrete) {
            $concreteStr = is_string($concrete) ? $concrete : gettype($concrete);
            if (is_string($concrete) && method_exists($concrete, '__invoke')) {
                $concrete = function () use ($concrete) {
                    return $this->app->call($concrete . '@__invoke');
                };
            }
            $this->app->singleton($abstract, $concrete);
            $config->set(sprintf('dependencies.%s', $abstract), $concreteStr);
        }
    }

    private function registerListeners(array $listeners): void
    {
        $dispatcher = $this->app->get(Dispatcher::class);
        foreach ($listeners as $event => $_listeners) {
            foreach ((array)$_listeners as $listener) {
                $dispatcher->listen($event, $listener);
            }
        }
    }
}
