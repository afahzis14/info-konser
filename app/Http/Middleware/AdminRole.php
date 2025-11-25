<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = auth()->user();
        
        if (!$user->hasAnyRole(['superadmin', 'admin'])) {
            abort(403, 'Akses ditolak. Hanya superadmin dan admin yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}

