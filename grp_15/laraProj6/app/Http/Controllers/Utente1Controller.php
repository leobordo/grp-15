<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
Use App\Models\Utente;
use App\Models\Coupon;
use App\Models\Promozione;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\View;

class Utente1Controller extends Controller 
{
    public function __construct()
{
    $this->middleware('web');
}

    public function getProfilo($chiave)
    {   
        if(auth()->user()->id==$chiave){
        $pr=Utente::where('id', $chiave)->first();
        /*
            vedi sopra
        */
        return view('profilo')
                    ->with('Profiloo', $pr);
        /*
            vedi sopra
        */
        }
        else {
            $redirectUrl='/';
            $message='Accesso negato, autorizzazione mancante. Verrai reindirizzato alla home tra 5 secondi...';
            return response(View::make('errors.Error403', compact('redirectUrl', 'message')));
        }
    }
    public function modificaProfilo($chiave)
    {
        $record = Utente::where('id', $chiave)->first();; // Recupera il record dal database
        
    // Passa il record alla view utilizzando il metodo with
    return view('forms.modificaProfilo')
        ->with('record', $record);
        
    }
    public function salvaProfilo(Request $request,$chiave)
    {   
        $pr=Utente::where('id',$chiave)->firstorfail();
        $attributi=[
            'Nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'Email' => [
                'required',
                'email',
                Rule::unique('utente')->ignore($pr->id),
                'max:255',
            ],
            'Telefono' => 'required|string|max:20',
            'Genere' => 'required|in:Maschio,Femmina,Altro',
            
        ];
        $messaggi=[
            'Nome.required' => 'Il Nome è obbligatorio',
            'Nome.string' => 'Il Nome deve essere una stringa',
            'Nome.max' => 'Il Nome supera i 255 caratteri',
            'cognome.required' => 'Il Cognome è obbligatorio',
            'cognome.string' => 'Il Cognome deve essere una stringa',
            'cognome.max' => 'Il Cognome supera i 255 caratteri',
            'Email.required' => 'l\'email è obbligatoria',
            'Email.email' => 'Non hai inserito l\'email nel formato tradzionale',
            'Email.max' => 'l\'email supera i 255 caratteri',
            'Email.unique' => 'l\'email inserita è già registrata',
            'Telefono.required' => 'Il Telefono è obbligatorio',
            'Telefono.string' => 'Il Telefono deve essere una stringa',
            'Telefono.max' => 'Il Nome supera i 20 caratteri',
            'Genere.required' => 'Il Genere è obbligatorio',
        ];
        $validator = Validator::make($request->all(),$attributi,$messaggi);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();//eventualmente ritorna al form con i messaggi di errore del validator e lascia nel form gli input
        }
        $nome=request('Nome');
        $cogn=request('cognome');
        $email=request('Email');
        $tel=request('Telefono');
        $gen=request('Genere');
        $pr->Nome = $nome;
        $pr->cognome = $cogn;
        $pr-> Email = $email;
        $pr-> Telefono = $tel;
        $pr-> Genere = $gen;
        $pr->save();
        return redirect('');
        // se tengo return redirect('/ilMioProfilo/{chiave}'); mi dà errore
    }

    public function showCoupon($request) {
        $coupon = Coupon::where('id',$request)->get()->first();
        //Verifica che il coupon esiste
        if($coupon==null) {
            $redirectUrl='/';
            $message='Accesso negato, coupon inesistente. Verrai reindirizzato alla home tra 5 secondi...';
                return response(View::make('errors.Error403', compact('redirectUrl', 'message')));
        }
       
        // Verifica se l'utente corrente corrisponde all'utente del coupon
        if ($coupon->Utente == auth()->user()->id) {
            return view("coupon", ['coupon' => $coupon]);
        } else {
            $redirectUrl='/';
                $message='Accesso negato, autorizzazione mancante. Verrai reindirizzato alla home tra 5 secondi...';
                return response(View::make('errors.Error403', compact('redirectUrl', 'message')));
        }
    }

    public function iMieiCoupon()
    {
        $co=Coupon::all();
        return view('iMieiCoupon',['coupons'=>$co]);
    }
    public function getCoupon($chiave)
    {
        
        $pr=Promozione::where('id',$chiave)->firstorfail();
        $coupon=new Coupon();
        $coupon->Utente=auth()->user()->id;
        $coupon->Promozione=$pr->id;
        $coupon->Data=date('Y-m-d');
        $coupon->Ora=date('H:i:s');
        $randomCode = substr(str_replace(['/', '+', '='], '', base64_encode(random_bytes(8))), 0, 8);
        $coupon->CodiceCoupon=$randomCode;
        $coupon->save();
        return view('coupon',['coupon'=>$coupon]);
        

    }

/*    public function showCoupon($chiave)
    {   
        if(auth()->user()->id==$chiave){
        $co=Utente::where('id', $chiave)->first();
        return view('coupon')
                    ->with('Couponn', $co);
        }
        else {
                $redirectUrl='/';
                $message='Accesso negato, autorizzazione mancante. Verrai reindirizzato alla home tra 5 secondi...';
                return response(View::make('errors.Error403', compact('redirectUrl', 'message')));
        }
    }*/
    
}