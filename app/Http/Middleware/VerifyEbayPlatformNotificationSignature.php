<?php

namespace App\Http\Middleware;

use App\Services\EbayPlatformNotificationsService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyEbayPlatformNotificationSignature
{
    protected EbayPlatformNotificationsService $ebayPlatformNotificationsService;

    public function __construct(EbayPlatformNotificationsService $ebayPlatformNotificationsService)
    {
        $this->ebayPlatformNotificationsService = $ebayPlatformNotificationsService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$this->ebayPlatformNotificationsService->verifySignature($request->getContent())) {
            abort(401);
        }

        return $next($request);
    }
}
