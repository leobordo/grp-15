<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LivelloAutorizzazioneMiddleware
{

    public function handle($request, Closure $next, ...$livelloAutorizzazione) //... sostanzialmente fa il cast di $livelloAutorizzazione come un array
    {
        $user = Auth::user();
        
        
        if ($user!=null && in_array($user->Livello,$livelloAutorizzazione)) {
            return $next($request);
        }

        // Utente non autorizzato, reindirizza o restituisci errore
            $message='Accesso negato, autorizzazione mancante. Verrai reindirizzato alla home tra 5 secondi...';
            return response()->view('errors.Error403', ['err' => $message]);

        // ^
        // |  restituise un istanza della vista Error403
        //    passando i valori  $message
    }
}
