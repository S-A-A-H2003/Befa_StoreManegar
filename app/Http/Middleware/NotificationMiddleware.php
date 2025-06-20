<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class NotificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('nid') && $request->user()) {
            $Notification = Auth::user()->notifications->unreadNotifications()->find($request->nid);
            if ($Notification) {
                $Notification->markAsRead();
            }
        }
        return $next($request);
    }
}
