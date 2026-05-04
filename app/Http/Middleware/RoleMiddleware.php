<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        $user = auth()->user();

        if ($user->role !== $role) {
            // Jika admin nyasar ke halaman user, lempar ke dashboard admin
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }
            // Jika user nyasar ke halaman admin, lempar ke beranda
            return redirect()->route('home');
        }

        return $next($request);
    }
}
