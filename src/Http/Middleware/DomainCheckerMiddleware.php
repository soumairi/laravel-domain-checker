<?php

namespace Soumairi\DomainChecker\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DomainCheckerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $allowedHosts = config('domain-checker.allowed_domains');
        $requestHost = $request->getHost();

        if (!app()->runningUnitTests()) {
            if (!\in_array($requestHost, $allowedHosts, false)) {
                $requestInfo = [
                    'host' => $requestHost,
                    'ip' => $request->getClientIp(),
                    'url' => $request->getRequestUri(),
                    'agent' => $request->header('User-Agent'),
                ];
                $error_msg=config('domain-checker.error_message');
                Log::alert('------------------------------------------Domaine Checker------------------------------------------');
                Log::alert('access_from_unauthorized_domain');
                Log::alert($requestInfo);
                Log::alert('---------------------------------------------------------------------------------------------------');
                throw new AccessDeniedHttpException($error_msg);
            }
        }
        return $next($request);
    }
}
