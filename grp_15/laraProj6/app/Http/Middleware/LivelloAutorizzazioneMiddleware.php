<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivelloAutorizzazioneMiddleware
{

    public function handle($request, Closure $next, $livelloAutorizzazione)
    {
        $user = Auth::user();

        if ($user && $user->Livello >= $livelloAutorizzazione) {
            return $next($request);
        }

        // Utente non autorizzato, reindirizza o restituisci errore
        abort(403, 'Accesso negato, non hai l\'autorizzaizone necessaria
        per visualizzare questa pagina.Torna alla home');
    }
    
   
}
