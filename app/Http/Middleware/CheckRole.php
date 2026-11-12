<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        // Si no ha iniciado sesión, redirigir al login
        if (! $request->user()) {
            return redirect()->route('login');
        }

        // Si el usuario tiene alguno de los roles indicados, dejarlo pasar
        if ($request->user()->hasAnyRole($roles)) {
            return $next($request);
        }

        // Si no tiene permiso, mostrar error 403
        abort(403, 'No tienes autorización para acceder a este módulo.');
    }
}
