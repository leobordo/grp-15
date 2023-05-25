<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Promozione;
use App\Models\Coupon;


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

public function showRisultatiPromo(Request $request)
{
    $cercato ='%'. $request->input('CercaPromo-input').'%';
    
    // Esegui la query per cercare i dati corrispondenti al testo di ricerca nella tua tabella
    $results = DB::table('promozioni')
                ->where('NomePromo', 'LIKE',  $cercato ) 
                ->orWhere('Azienda', 'LIKE', $cercato)
                ->get();
    
    // Passa i risultati alla vista per visualizzarli
    return view('risultati_ricerca_promozioni', ['results' => $results]);
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

    public function showWho(){
        return view("who");
    }
    public function showHome()
{
    $pr=Promozione::all();
    return view("welcome",["promozioni"=>$pr]);
   
}

    
}