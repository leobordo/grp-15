<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class VerifyAjaxRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
{
    if (!$request->ajax()) {
        $redirectUrl='/';
            $message='Accesso negato. Verrai reindirizzato alla home tra 5 secondi...';
            return response(View::make('errors.Error403', compact('redirectUrl', 'message')));
    }

    return $next($request);
}

}
