<?php

namespace PeibinLaravel\Request;

use Illuminate\Http\Request;
use PeibinLaravel\Context\Context;
use RuntimeException;
use Swoole\Coroutine;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class RequestProxy extends Request
{
    /* Override Symfony\Component\HttpFoundation\Request::class all public methods. */

    /**
     * {@inheritdoc}
     */
    public function getClientIps(): array
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getClientIp(): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getScriptName(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     *
     * @return string The raw path (i.e. not urldecoded)
     */
    public function getPathInfo(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     *
     * @return string The raw path (i.e. not urldecoded)
     */
    public function getBasePath(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseUrl(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getScheme(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getPort(): int|string|null
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getUser(): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword(): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getUserInfo(): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getHttpHost(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestUri(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getSchemeAndHttpHost(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     *
     * @see getQueryString()
     */
    public function getUri(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getUriForPath(string $path): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getRelativeUriForPath(string $path): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryString(): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function isSecure(): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getHost(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setMethod(string $method)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getMethod(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getRealMethod(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getMimeType(string $format): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getFormat(?string $mimeType): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getRequestFormat(?string $default = 'html'): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setRequestFormat(?string $format)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getContentType(): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultLocale(string $locale)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultLocale(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setLocale(string $locale)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getLocale(): string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function isMethod(string $method): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function isMethodSafe(): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function isMethodIdempotent(): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function isMethodCacheable(): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getProtocolVersion(): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getContent(bool $asResource = false)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getETags(): array
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function isNoCache(): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getPreferredFormat(?string $default = 'html'): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getPreferredLanguage(array $locales = null): ?string
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getLanguages(): array
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getCharsets(): array
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getEncodings(): array
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getAcceptableContentTypes(): array
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function isXmlHttpRequest(): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function preferSafeContent(): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function isFromTrustedProxy(): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /* Override Illuminate\Http\Request::class all public methods. */

    /**
     * {@inheritdoc}
     */
    public function instance()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function method()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function root()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function url()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function fullUrl()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function fullUrlWithQuery(array $query)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function fullUrlWithoutQuery($keys)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function path()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function decodedPath()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function segment($index, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function segments()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function is(...$patterns)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function routeIs(...$patterns)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function fullUrlIs(...$patterns)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function host()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function httpHost()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function schemeAndHttpHost()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function ajax()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function pjax()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function prefetch()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function secure()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function ip()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function ips()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function userAgent()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function merge(array $input)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function mergeIfMissing(array $input)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function replace(array $input)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function json($key = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function duplicate(
        array $query = null,
        array $request = null,
        array $attributes = null,
        array $cookies = null,
        array $files = null,
        array $server = null
    ): static {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function hasPreviousSession(): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function hasSession(bool $skipIfUninitialized = false): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setSession(SessionInterface $session)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setSessionFactory(callable $factory)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getSession(): SessionInterface
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function session()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setLaravelSession($session)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setRequestLocale(string $locale)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultRequestLocale(string $locale)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function user($guard = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function route($param = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function fingerprint()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setJson($json)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getUserResolver()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setUserResolver(\Closure $callback)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function getRouteResolver()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function setRouteResolver(\Closure $callback)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset): bool
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset): mixed
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value): void
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset): void
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function __isset($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function __get($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /* Override Illuminate\Http\Concerns\InteractsWithContentTypes::class all public methods. */

    /**
     * {@inheritdoc}
     */
    public function isJson()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function expectsJson()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function wantsJson()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function accepts($contentTypes)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function prefers($contentTypes)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function acceptsAnyContentType()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function acceptsJson()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function acceptsHtml()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function format($default = 'html')
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /* Override Illuminate\Http\Concerns\InteractsWithFlashData::class all public methods. */

    /**
     * {@inheritdoc}
     */
    public function old($key = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function flash()
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function flashOnly($keys)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function flashExcept($keys)
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function flush()
    {
        $this->call(__FUNCTION__, func_get_args());
    }

    /* Override Illuminate\Http\Concerns\InteractsWithInput::class all public methods. */

    /**
     * {@inheritdoc}
     */
    public function server($key = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function hasHeader($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function header($key = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function bearerToken()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function exists($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function has($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function hasAny($keys)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function whenHas($key, callable $callback, callable $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function filled($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function isNotFilled($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function anyFilled($keys)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function whenFilled($key, callable $callback, callable $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function missing($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function keys()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function all($keys = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function input($key = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function str($key, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function string($key, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function boolean($key = null, $default = false)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function date($key, $format = null, $tz = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function enum($key, $enumClass)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function collect($key = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function only($keys)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function except($keys)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function query($key = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function post($key = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function hasCookie($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function cookie($key = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function allFiles()
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function hasFile($key)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /**
     * {@inheritdoc}
     */
    public function file($key = null, $default = null)
    {
        return $this->call(__FUNCTION__, func_get_args());
    }

    /* Current class all public methods. */

    /**
     * Calling Request instance methods.
     */
    protected function call($name, $arguments)
    {
        // Calling parent class methods in a non-coroutine environment or
        // when an instance cannot be obtained in a coroutine context
        if (Coroutine::getCid() == -1 || !($request = $this->getRequest())) {
            return parent::$name(...$arguments);
        }

        if (!method_exists($request, $name)) {
            throw new RuntimeException('Method not exist.');
        }
        return $request->{$name}(...$arguments);
    }

    /**
     * Get the Request instance from the coroutine context.
     *
     * @return Request|null
     */
    protected function getRequest(): ?Request
    {
        return Context::get(Request::class);
    }
}
