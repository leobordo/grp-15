<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


class PublicController extends Controller
{

public function showRisultatiCl(Request $request)
{
    $cercato ='%'. $request->input('CercaUtenti-input2').'%';
    
    // Esegui la query per cercare i dati corrispondenti al testo di ricerca nella tua tabella
    $results = DB::table('utente')
                ->where('NomeUtente', 'LIKE',  $cercato )
                ->where('Livello','=','1')
                ->get();
    
    // Passa i risultati alla vista per visualizzarli
    return view('risultati_ricerca_clienti', ['results' => $results]);
}

public function showRisultatiOp(Request $request)
{
    $cercato ='%'. $request->input('CercaUtenti-input').'%';
    
    // Esegui la query per cercare i dati corrispondenti al testo di ricerca nella tua tabella
    $results = DB::table('utente')
                ->where('NomeUtente', 'LIKE',  $cercato )
                ->where('Livello','=','2')
                ->get();
    
    // Passa i risultati alla vista per visualizzarli
    return view('risultati_ricerca_operatori', ['results' => $results]);
}

    public function showFaq(){
        return view("faq");
    }
    
}