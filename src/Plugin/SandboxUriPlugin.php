<?php


namespace Imper86\PhpInpostApi\Plugin;


use Http\Client\Common\Plugin;
use Http\Promise\Promise;
use Imper86\PhpInpostApi\Enum\EndpointHost;
use Psr\Http\Message\RequestInterface;

class SandboxUriPlugin implements Plugin
{
    public function handleRequest(RequestInterface $request, callable $next, callable $first): Promise
    {
        $uri = $request->getUri();
        $uri = $uri->withHost(EndpointHost::SANDBOX);

        return $next($request->withUri($uri));
    }
}
