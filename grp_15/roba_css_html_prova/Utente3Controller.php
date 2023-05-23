<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\UtenteLivello1;
use App\Models\Utente;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Utente3Controller extends Controller
{
    public function __construct()
{
    $this->middleware('web');
}

    public function showOperatori()
    {
        $op=Utente::where('Livello','2')->get();
        return view('gestioneOperatori',['operatori'=>$op]);
    }
    public function getOperatore($chiave)
    {
        $op=Utente::where('NomeUtente', $chiave)->first();
        /*
            where è un metodo di Eloquent, cerca l'attributo NomeUtente
            con il valore di $chiave(vedi gestioneOperatori.blade.php).
            first() restituisce il primo valore utile
        */
        return view('operatore')
                    ->with('Operatoree', $op);
        /*
            ritorna la view operatore.blade.php dove la variabile $op viene
            passata nella vista così -> $Operatoree
        */
    }
    public function getCliente($chiave)
    {
        $cl=Utente::where('NomeUtente', $chiave)->first();
        /*
            vedi sopra
        */
        return view('cliente')
                    ->with('Clientee', $cl);
        /*
            vedi sopra
        */
    }
    public function deleteOperatore($chiave)
    {
        Utente::where('NomeUtente', $chiave)->delete();
        return redirect('/listaOperatori');
        /*
         elimina la tupla della tabella Utentelivello2 dove la chiave NomeUtente
         ha il valore $chiave
        */
    }
    public function deleteCliente($chiave)
    {
        Utente::where('NomeUtente', $chiave)->delete();
        return view('gestioneClienti');
        /*
         elimina la tupla della tabella Utentelivello2 dove la chiave NomeUtente
         ha il valore $chiave
        */
    }
    public function showFormOperatore(){
        return view('forms.aggiungiOperatore');
    }
    public function aggiungiOperatore(Request $request)
    {
        $attributi=[
            'Nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'Email' => 'required|email|unique:Utente|max:255',
            'Telefono' => 'required|string|max:20',
            'Genere' => 'required',
            'Livello'=>'required|integer|min:1|max:3',
            'NomeUtente' => 'required|string|unique:Utente|max:255',
            'Password' => 'required|string|min:6',
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
            'Livello.required' => 'Specifica il livello',
            'Livello.integer' => 'Devi inserire un intero compreso tra 1 e 3',
            'Livello.min' => 'Devi inserire un intero compreso tra 1 e 3',
            'Livello.max' => 'Devi inserire un intero compreso tra 1 e 3',
            'NomeUtente.required' => 'Il Nomeutente è obbligatorio',
            'NomeUtente.string' => 'Il Nomeutente deve essere una stringa',
            'NomeUtente.max' => 'Il Nomeutente supera i 255 caratteri',
            'NomeUtente.unique' => 'Il Nomeutente inserito è già registrato',
            'Password.required' => 'La Password è obbligatoria',
            'Password.string' => 'La Password deve essere una stringa',
            'Password.min' => 'La Password deve essere minimo 6 caratteri'
        ];
        $validator = Validator::make($request->all(),$attributi,$messaggi);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();//eventualmente ritorna al form con i messaggi di errore del validator e lascia nel form gli input
        }
        $operatore= new Utente();
        $nome=request('Nome');
        $cogn=request('cognome');
        $email=request('Email');
        $tel=request('Telefono');
        $gen=request('Genere');
        $liv=request('Livello');
        $usern=request('NomeUtente');
        $psw=request('Password');
        $operatore->Nome = $nome;
        $operatore->cognome = $cogn;
        $operatore-> Email = $email;
        $operatore-> Telefono = $tel;
        $operatore-> Genere = $gen;
        $operatore-> Livello = $liv;
        $operatore-> NomeUtente = $usern;
        $operatore-> Password = $psw;
        $operatore->save();
        return redirect('/listaOperatori');
    ;
} 
    public function modificaOperatore($chiave)
    {
        $record = Utente::where('NomeUtente', $chiave)->first();; // Recupera il record dal database

    // Passa il record alla view utilizzando il metodo with
    return view('forms.modificaOperatore')
        ->with('record', $record);
    }
    public function salvaOperatore(Request $request, $chiave)
    {   $usern_vecchio=Utente::where('NomeUtente', $chiave);
        $attributi=[
            'Nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'Email' => 'required|email|unique:Utentelivello2|max:255',
            'Telefono' => 'required|string|max:20',
            'Genere' => 'required|in:Maschio,Femmina,Altro',
            'Livello'=>'required|integer|min:1|max:3',
            'NomeUtente' => 'required|string|unique:Utentelivello2|max:255',
            'Password' => 'required|string|min:6',
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
            'Livello.required' => 'Specifica il livello',
            'Livello.integer' => 'Devi inserire un intero compreso tra 1 e 3',
            'Livello.min' => 'Devi inserire un intero compreso tra 1 e 3',
            'Livello.max' => 'Devi inserire un intero compreso tra 1 e 3',
            'NomeUtente.required' => 'Il Nomeutente è obbligatorio',
            'NomeUtente.string' => 'Il Nomeutente deve essere una stringa',
            'NomeUtente.max' => 'Il Nomeutente supera i 255 caratteri',
            'NomeUtente.unique' => 'Il Nomeutente inserito è già registrato',
            'Password.required' => 'La Password è obbligatoria',
            'Password.string' => 'La Password deve essere una stringa',
            'Password.min' => 'La Password deve essere minimo 6 caratteri'
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
        $liv=request('Livello');
        $usern=request('NomeUtente');
        $psw=request('Password');
        $operatore=Utente::find($usern_vecchio);
        $operatore->Nome = $nome;
        $operatore->cognome = $cogn;
        $operatore-> Email = $email;
        $operatore-> Telefono = $tel;
        $operatore-> Genere = $gen;
        $operatore-> Livello = $liv;
        $operatore-> NomeUtente = $usern;
        $operatore-> Password = $psw;
        $operatore->save();
        return view('gestioneOperatori');
    }
    public function showFaq(){
        return view("faq");
    }
}