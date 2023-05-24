<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Utente;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'NomeUtente' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:Utente'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'Nome'=>['required', 'string', 'max:255'],
            'Cognome'=>['required', 'string', 'max:255'],
            'Telefono'=>['required','string','max:20'],
            'Genere'=>['required','in:Maschio,Femmina,Altro']
        ]);

        $user = Utente::create([
            'NomeUtente' => $request->NomeUtente,
            'Email' => $request->Email,
            'Password' => Hash::make($request->password),
            'Nome' => $request->Nome,
            'cognome' => $request->Cognome,
            'Telefono' => $request->Telefono,
            'Genere' => $request->Genere,
            'Livello'=> 1
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
