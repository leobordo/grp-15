<?php

namespace App\Http\Controllers;


use App\Models\Azienda;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Promozione;
use App\Models\Faq;
use App\Models\Coupon;
use Illuminate\Support\Facades\View;
use PHPUnit\Framework\Constraint\IsInstanceOf;


class PublicController extends Controller
{

public function showRisultatiCl(Request $request)
{
    $cercato = $request->input('CercaUtenti-input2');
    
    // Esegui la query per cercare i dati corrispondenti al testo di ricerca nella tua tabella
    $results = DB::table('utente')
                ->where('NomeUtente', '=',  $cercato )
                ->where('Livello','=','1')
                ->get();
    
    if(count($results)==0) return redirect('/listaClienti')->with('err','Nessun risultato!');
    // Passa i risultati alla vista per visualizzarli
    return view('risultati_ricerca_clienti', ['results' => $results]);
}
public function showRisultatiAz(Request $request)
{
    $cercato =$request->input('CercaAziende-input');
    
    // Esegui la query per cercare i dati corrispondenti al testo di ricerca nella tua tabella
    $results = DB::table('azienda')
                ->where('Nome', '=',  $cercato )
                ->get();
                
                
    if(count($results)==0) return redirect('/aziende')->with('err','Nessun risultato!');
    // Passa i risultati alla vista per visualizzarli
    return view('risultati_ricerca_aziende', ['results' => $results]);
}
public function getPromozionePublic($chiave){
    $pr=Promozione::where('id', $chiave)->first();
    if ($pr==null) {
        $redirectUrl='/';
        $message='Promo non esistente. Verrai reindirizzato alla home tra 5 secondi...';
        return response(View::make('errors.Error404', compact('redirectUrl', 'message')));
    }
    if ($pr->Scadenza >= date('Y-m-d') || auth()->user()->Livello==2 ) {
        return view('promozione')
                    ->with('promozione', $pr);
    } else {
        $redirectUrl='/';
            $message='Accesso negato, promo scaduta. Verrai reindirizzato alla home tra 5 secondi...';
            return response(View::make('errors.Error403', compact('redirectUrl', 'message')));
    }
}
/*public function showRisultatiPromo(Request $request)
{
    if(auth()->check() && auth()->user()->Livello==2) {
        $currentDate = new DateTime('0001-01-01');}
    else $currentDate = Carbon::now()->toDateString();
    $az_input=$request->input('CercaPromo-az');
    $az=Azienda::where('Nome',$az_input)->first();
    
    
    $cercato_descr=$request->input('CercaPromo-descr');
    
    
    if ($cercato_descr == null && $az_input==null) {
        return redirect('/')->with('err', 'Nessun risultato!');
    }
    
    if($az_input==null) $az_id='%';
    elseif($az==null) return redirect('/')->with('err', 'Nessun Risultato! Se inserisci un\'azienda, questa deve essere registrata');
    else $az_id=$az->id;
     
     
    SPIEGAZIONE whereRaw:
    *whereRaw permette di creare una query SQL scrivendola manualmente, a discapito ovviamente della sicurezza.
    *CONCAT(' ',DescrizioneSconto,' ') serve ad inserire all'inzio e alla fine degli spazi in modo tale da consentire una valutazione
    *termine per termine corretta. Con REGEXP stiamo chedendo a Sql di valutare ogni termine di DescrizioneSconto singolarmente con
    *quello che mettiamo dopo REGEXP. [[:<:]]  questi valori servono a limitare la "regular expression" che REGEXP userà nel confronto.
    *preg_quote($cercato_descr, '/') serve a quotare i caratteri speciali ed evitare che ci siano  problemi nella ricerca di termini con essi
    
    // Esegui la query per cercare i dati corrispondenti al testo di ricerca nella tua tabella
    if($cercato_descr==null){ 
        $cercato_descr='%';
        $results = DB::table('promozioni')
                        ->where('Azienda', 'LIKE', $az_id) 
                        ->where('DescrizioneSconto', 'LIKE', $cercato_descr)
                        ->where('Scadenza','>=',$currentDate )->get();
                
        return view('risultati_ricerca_promozioni', ['results' => $results]);
    }

    $results = DB::table('promozioni')
                        ->where('Azienda', 'LIKE', $az_id)
                        ->where('Scadenza','>=',$currentDate )
                        ->where(function ($query) use ($cercato_descr) {
                                $termini = explode(' ', $cercato_descr);
                                foreach ($termini as $termine) {
                                        $query->orWhereRaw("CONCAT(' ', DescrizioneSconto, ' ') 
                                        REGEXP '[[:<:]]" . preg_quote($termine, '/') . "[[:>:]]'");
                                        }
    })
    ->get();

    // Passa i risultati alla vista per visualizzarli
    
    if(count($results)!=0) return view('risultati_ricerca_promozioni', ['results' => $results]);
    else return redirect('/')->with('err', 'Nessun risultato!');
}*/
public function showRisultatiPromo(Request $request)
{
    if ($request->ajax()) {
        $currentDate = new DateTime('0001-01-01');
        $az_input = $request->input('CercaPromo-az');
        $az = Azienda::where('Nome', $az_input)->first();
        $cercato_descr = $request->input('CercaPromo-descr');

        if ($cercato_descr == null && $az_input == null) {
            return view('partials.risultati_ricerca_promozioni', ['results' => []])->with('err', 'Nessun risultato!');
        }

        if ($az_input == null) {
            $az_id = '%';
        } elseif ($az == null) {
            return view('partials.risultati_ricerca_promozioni', ['results' => []])->with('err', 'Nessun risultato!');
        } else {
            $az_id = $az->id;
        }

        if ($cercato_descr == null) {
            $cercato_descr = '%';
        }

        $results = DB::table('promozioni')
            ->where('Azienda', 'LIKE', $az_id)
            ->where('DescrizioneSconto', 'LIKE', $cercato_descr)
            ->where('Scadenza', '>=', $currentDate)
            ->get();

        if (count($results) != 0) {
            return view('partials.risultati_ricerca_promozioni', ['results' => $results])->render();
        } else {
            return view('partials.risultati_ricerca_promozioni', ['results' => []])->with('err', 'Nessun risultato!')->render();
        }
    } else {
        $currentDate = new DateTime('0001-01-01');
        $az_input = $request->input('CercaPromo-az');
        $az = Azienda::where('Nome', $az_input)->first();
        $cercato_descr = $request->input('CercaPromo-descr');

        if ($cercato_descr == null && $az_input == null) {
            return redirect('/')->with('err', 'Nessun risultato!');
        }

        if ($az_input == null) {
            $az_id = '%';
        } elseif ($az == null) {
            return redirect('/')->with('err', 'Nessun Risultato! Se inserisci un\'azienda, questa deve essere registrata');
        } else {
            $az_id = $az->id;
        }

        if ($cercato_descr == null) {
            $cercato_descr = '%';
        }

        $results = DB::table('promozioni')
            ->where('Azienda', 'LIKE', $az_id)
            ->where('DescrizioneSconto', 'LIKE', $cercato_descr)
            ->where('Scadenza', '>=', $currentDate)
            ->get();

        if (count($results) != 0) {
            return view('risultati_ricerca_promozioni', ['results' => $results]);
        } else {
            return redirect('/')->with('err', 'Nessun risultato!');
        }
    }
}



public function showRisultatiOp(Request $request)
{
    $cercato =$request->input('CercaUtenti-input');
    
    // Esegui la query per cercare i dati corrispondenti al testo di ricerca nella tua tabella
    $results = DB::table('utente')
                ->where('NomeUtente', '=',  $cercato )
                ->where('Livello','=','2')
                ->get();
    if(count($results)==0) return redirect('/listaOperatori')->with('err','Nessun risultato!');
    // Passa i risultati alla vista per visualizzarli
    return view('risultati_ricerca_operatori', ['results' => $results]);
}

    public function showFaq(){
        $fq=Faq::all();
        return view("faq",["faqs"=>$fq]);
    }

    public function showWho(){
        return view("who");
    }
    public function showHome()
{
    $pr=Promozione::all();
    $az=Azienda::paginate(3);
    return view("welcome",["promozioni"=>$pr],["aziende"=>$az]);
}

public function getAziendaPublic($chiave)
{
    $az=Azienda::where('id', $chiave)->firstOrFail();
    
    return view('azienda', ['azienda'=>$az]);
}
public function showRicercaAvanzata()
{
    return view('risultati_ricerca_promozioni');
}

    
}