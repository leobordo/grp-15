<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\UtenteLivello1;
use App\Models\UtenteLivello2;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Utente3Controller extends Controller
{
    public function showOperatori()
    {
        return view('gestioneOperatori');
    }
    public function getOperatore($chiave)
    {
        $op=UtenteLivello2::where('NomeUtente', $chiave)->first();
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
        $cl=UtenteLivello1::where('NomeUtente', $chiave)->first();
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
        UtenteLivello2::where('NomeUtente', $chiave)->delete();
        return view('gestioneOperatori');
        /*
         elimina la tupla della tabella Utentelivello2 dove la chiave NomeUtente
         ha il valore $chiave
        */
    }
    public function deleteCliente($chiave)
    {
        UtenteLivello1::where('NomeUtente', $chiave)->delete();
        return view('gestioneClienti');
        /*
         elimina la tupla della tabella Utentelivello2 dove la chiave NomeUtente
         ha il valore $chiave
        */
    }
    public function aggiungiOperatore(Request $request)
    {
        $attributi=[
            'Nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'Email' => 'required|email|unique:Utentelivello2|max:255',
            'Telefono' => 'required|string|max:20',
            'Genere' => 'required|in:Maschio,Femmina,Altro',
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
        $operatore= new UtenteLivello2();
        $nome=request('Nome');
        $cogn=request('cognome');
        $email=request('Email');
        $tel=request('Telefono');
        $gen=request('Genere');
        $usern=request('NomeUtente');
        $psw=request('Password');
        $operatore->Nome = $nome;
        $operatore->cognome = $cogn;
        $operatore-> Email = $email;
        $operatore-> Telefono = $tel;
        $operatore-> Genere = $gen;
        $operatore-> NomeUtente = $usern;
        $operatore-> Password = $psw;
        $operatore->save();
    return view('gestioneOperatori');
} 
    public function modificaOperatore($chiave)
    {
        $record = UtenteLivello2::where('NomeUtente', $chiave)->first();; // Recupera il record dal database

    // Passa il record alla view utilizzando il metodo with
    return view('modificaOperatore')
        ->with('record', $record);
    }
    public function salvaOperatore(Request $request)
    {
        $attributi=[
            'Nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'Email' => 'required|email|unique:Utentelivello2|max:255',
            'Telefono' => 'required|string|max:20',
            'Genere' => 'required|in:Maschio,Femmina,Altro',
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
        $usern=request('NomeUtente');
        $psw=request('Password');
        $operatore=UtenteLivello2::find($usern);
        $operatore->Nome = $nome;
        $operatore->cognome = $cogn;
        $operatore-> Email = $email;
        $operatore-> Telefono = $tel;
        $operatore-> Genere = $gen;
        $operatore-> NomeUtente = $usern;
        $operatore-> Password = $psw;
        $operatore->save();
        return view('gestioneOperatori');
    }
}