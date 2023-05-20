<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\UtenteLivello1;
use App\Models\UtenteLivello2;
use Illuminate\Support\Facades\Log;


class PublicController extends Controller
{
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
    public function aggiungiOperatore()
    {
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
}