<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;

class NewPasswordController extends Controller
{

    public function create()
    {
        return view('auth.reset-password');
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $vecchia_psw = auth()->user()->Password;

    $attributi = [
    'vecchia_password' => [
        'required',
        function ($attribute, $value, $fail) use ($vecchia_psw) {
            if (!Hash::check($value, $vecchia_psw)) {
                $fail('La vecchia password inserita non è corretta.');
            }
        },
    ],
    'password' => ['required', 'confirmed', Rules\Password::defaults()],
];

$messaggi = [
    'vecchia_password.required' => 'Vecchia password necessaria',
    'vecchia_password.rules' => 'La vecchia password inserita non è corretta',
    'password.required' => 'Nuova password necessaria',
    'password.confirmed' => 'Le password non corrispondono',
    'password.rules' => 'La password deve essere di almeno 8 caratteri',
];

$validator = Validator::make($request->all(), $attributi, $messaggi);

if ($validator->fails()) {
    return redirect()->back()->withErrors($validator)->withInput();
}
        $psw=request('password');
        $psw_cripto=Hash::make($psw);
        auth()->user()->Password=$psw_cripto;
        auth()->user()->save();
        return  redirect()->route('profilo',[auth()->user()->id])->with(['err' =>'Password aggiornata con successo']);
            
    }

}
