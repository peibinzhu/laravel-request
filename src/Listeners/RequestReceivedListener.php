<?php

declare(strict_types=1);

namespace PeibinLaravel\Request\Listeners;

use Illuminate\Http\Request;
use Laravel\Octane\Events\RequestReceived;
use PeibinLaravel\Context\Context;
use PeibinLaravel\Request\RequestProxy;

class RequestReceivedListener
{
    public function handle(object $event): void
    {
        if (!$event instanceof RequestReceived) {
            return;
        }

        // Save the current request instance to the coroutine context.
        Context::set(Request::class, $event->request);

        // Change the 'request' instance in the app container to use RequestProxy.
        $event->app['request'] = $event->app->get(RequestProxy::class);
        $event->sandbox['request'] = $event->app->get(RequestProxy::class);
    }
}
