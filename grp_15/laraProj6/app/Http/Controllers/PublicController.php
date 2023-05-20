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
}