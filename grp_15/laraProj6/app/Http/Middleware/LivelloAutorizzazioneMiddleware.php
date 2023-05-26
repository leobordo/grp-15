<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LivelloAutorizzazioneMiddleware
{

    public function handle($request, Closure $next, $livelloAutorizzazione)
    {
        $user = Auth::user();

        if ($user && $user->Livello >= $livelloAutorizzazione) {
            return $next($request);
        }

        // Utente non autorizzato, reindirizza o restituisci errore
        $redirectUrl = '/';
        $message = 'Accesso negato, autorizzazione mancante. Verrai reindirizzato alla home tra 5 secondi...';

        return response(View::make('errors.Error403', compact('redirectUrl', 'message'))); 
        // ^
        // |  restituise un istanza della vista Error403
        //    passando i valori di $redirectUrl e $message
        //    compact crea un array associativo con le keys e i valori sono quelli delle variabli con lo stesso nome delle keys 
    }

    
   
}
