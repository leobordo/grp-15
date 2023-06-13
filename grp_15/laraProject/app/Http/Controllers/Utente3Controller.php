<?php

namespace App\Http\Controllers;

use App\Models\Assegnazione;
use App\Models\Azienda;
use App\Models\Catalog;
use App\Models\Utente;
use App\Models\Promozione;
use App\Rules\NullableIfRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use App\Models\Faq;

class Utente3Controller extends Controller
{
    public function __construct()
{
    $this->middleware('web');
}

    public function showOperatori()
    {
        $op=Utente::where('Livello','2')->paginate(5);
        return view('gestioneOperatori',['operatori'=>$op ]);
    }
    public function showStats()
    {
        $cli=Utente::where('Livello','1')->get();
        $promo=Promozione::all();
        return view('statistiche',['promozioni'=>$promo],['clienti'=>$cli]);
    }
    public function showClienti()
    {
        $cl=Utente::where('Livello','1')->paginate(5);
        return view('gestioneClienti',['clienti'=>$cl]);
    }
    public function showPromozioni()
    {
        $pr=Promozione::paginate(10);
        return view('gestionePromozioni',['promozioni'=>$pr]);
    }
    public function getOperatore($chiave)
    {
        $op=Utente::where('id', $chiave)->where('Livello', '2')->firstOrFail();
        /*
            where è un metodo di Eloquent, cerca l'attributo NomeUtente
            con il valore di $chiave(vedi gestioneOperatori.blade.php).
            first() restituisce il primo valore utile
        */
        if($op){
        return view('operatore')
                    ->with('Operatoree', $op);
        /*
            ritorna la view operatore.blade.php dove la variabile $op viene
            passata nella vista così -> $Operatoree
        */
        }
        else return view('forms.aggiungiOperatore');
    }
    public function getCliente($chiave)
    {
        $cl=Utente::where('id', $chiave)->where('Livello','1')->firstOrFail();
        /*
            vedi sopra
        */
        return view('cliente')
                    ->with('Clientee', $cl);
        /*
            vedi sopra
        */
    }
    public function getPromozione($chiave)
    {
        
        $pr=Promozione::where('id', $chiave)->firstOrFail();
        /*
            where è un metodo di Eloquent, cerca l'attributo NomeUtente
            con il valore di $chiave(vedi gestioneOperatori.blade.php).
            first() restituisce il primo valore utile
        */
       
        return view('promozione')
                    ->with('promozione', $pr);
        
    }
    public function deleteOperatore($chiave)
    {
        Utente::where('id', $chiave)->delete();
        return redirect('/listaOperatori');
        /*
         elimina la tupla della tabella Utentelivello2 dove la chiave NomeUtente
         ha il valore $chiave
        */
    }
    public function deleteCliente($chiave)
    {
        Utente::where('id', $chiave)->delete();
        return redirect('/listaClienti');
        /*
         elimina la tupla della tabella Utentelivello2 dove la chiave NomeUtente
         ha il valore $chiave
        */
    }
    public function deletePromozione($chiave)
    {
        Promozione::where('id', $chiave)->delete();
        return redirect('/listaPromozioni');
        /*
         elimina la tupla della tabella Utentelivello2 dove la chiave NomeUtente
         ha il valore $chiave
        */
    }

    public function aggiungiFaq(Request $request){
       
        
        $attributi=[
            'inputDomanda'=>'required',
            'inputRisposta'=>'required',
        ];
        $messaggi=[
            'inputDomanda.required'=>'Devi inserire una domanda',
            
            'inputRisposta.required'=>'Devi inserire una risposta',
            
        ];
        $validator = Validator::make($request->all(),$attributi,$messaggi);
    
        if ($validator->fails() ) {
            if(strlen(request('inputDomanda'))>255) return redirect()->back()->withErrors($validator)->with('errorDesc','Domanda troppo lunga')->withInput();
            if(strlen(request('inputRisposta'))>255) return redirect()->back()->withErrors($validator)->with('errorDesc','Risposta troppo lunga')->withInput();
            return redirect()->back()->withErrors($validator)->withInput();//eventualmente ritorna al form con i messaggi di errore del validator e lascia nel form gli input
        }
        if(strlen(request('inputDomanda'))>255) return redirect()->back()->with('errorDesc','Domanda troppo lunga')->withInput();
            if(strlen(request('inputRisposta'))>255) return redirect()->back()->with('errorDesc','Risposta troppo lunga')->withInput();
        $dom=request('inputDomanda');
        $risp=request('inputRisposta');
        


        $faq=new Faq();
        $faq->Domanda=$dom;
        $faq->Risposta=$risp;
        $faq->save();
        return redirect('/faq');
 
     }
     public function modificaFaq(Request $request) {
        $attributi=[
            'inputDomandaM'=>'required',
            'inputRispostaM'=>'required',
        ];
        $messaggi=[
            'inputDomandaM.required'=>'Devi inserire una domanda',
            
            'inputRispostaM.required'=>'Devi inserire una risposta',
            
        ];
        $validator = Validator::make($request->all(),$attributi,$messaggi);
    
        if ($validator->fails() ) {
            if(strlen(request('inputDomandaM'))>255) return redirect()->back()->withErrors($validator)->with('errorDesc','Domanda troppo lunga')->withInput();
            if(strlen(request('inputRispostaM'))>255) return redirect()->back()->withErrors($validator)->with('errorDesc','Risposta troppo lunga')->withInput();
            return redirect()->back()->withErrors($validator)->withInput();//eventualmente ritorna al form con i messaggi di errore del validator e lascia nel form gli input
        }
        if(strlen(request('inputDomandaM'))>255) return redirect()->back()->with('errorDesc','Domanda troppo lunga')->withInput();
            if(strlen(request('inputRispostaM'))>255) return redirect()->back()->with('errorDesc','Risposta troppo lunga')->withInput();
        $dom  = request('inputDomandaM');
         $risp = request('inputRispostaM');
         $id= request('name_id');
         
        
         $faq = Faq::find($id);
         $faq->Domanda = $dom;
         $faq->Risposta = $risp;
         $faq->save();
     
         return redirect('/faq');
     }
 
 public function eliminaFaq($chiave)
     {
         Faq::where('id', $chiave)->delete();
         return redirect('/faq');
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
            'Email' => 'required|email|unique:utente|max:255',
            'Telefono' => 'required|numeric|digits:10',
            'Genere' => 'required|in:Maschio,Femmina,Altro',
            'Livello',
            'NomeUtente' => 'required|string|unique:utente|max:255',
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
            'Telefono.numeric' => 'Il Telefono non può avere caratteri, ma solo numeri',
            'Telefono.digits' => 'Il Telefono deve avere 10 cifre',
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
        $operatore = new Utente();
        $nome=request('Nome');
        $cogn=request('cognome');
        $email=request('Email');
        $tel=request('Telefono');
        $gen=request('Genere');
        $liv=2;
        $usern=request('NomeUtente');
        $psw=request('Password');
        $psw_hash=Hash::make($psw);
        $operatore->Nome = $nome;
        $operatore->cognome = $cogn;
        $operatore-> Email = $email;
        $operatore-> Telefono = $tel;
        $operatore-> Genere = $gen;
        $operatore-> Livello = $liv;
        $operatore-> NomeUtente = $usern;
        $operatore-> Password = $psw_hash;
        $operatore->save();
        return redirect('/listaOperatori');
    ;
} 
    public function modificaOperatore($chiave)
    {
        $record = Utente::where('id', $chiave)->firstOrFail();; // Recupera il record dal database
        
    // Passa il record alla view utilizzando il metodo with
    return view('forms.modificaOperatore')
        ->with('record', $record);
        

    }
    
    public function salvaOperatore(Request $request,$chiave)
    {   
        $oper=Utente::where('id',$chiave)->firstorfail();
        $attributi=[
            'Nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'Email' => [
                'required',
                'email',
                Rule::unique('utente')->ignore($oper->id),
                'max:255',
            ],
            'Telefono' => 'required|string|max:20',
            'Genere' => 'required|in:Maschio,Femmina,Altro',
            'Livello',
            'Password' => 'nullable|string|min:6|required_if:password,!=,',
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
        $liv=2;
        $psw=request('Password');
        if($psw!=null) $psw_hash=Hash::make($psw);
        else $psw_hash=$oper->Password;
        $oper->Nome = $nome;
        $oper->cognome = $cogn;
        $oper-> Email = $email;
        $oper-> Telefono = $tel;
        $oper-> Genere = $gen;
        $oper-> Livello = $liv;
        $oper-> Password = $psw_hash;
        $oper->save();
        return redirect('/listaOperatori');
    }
    public function modificaPromozione($chiave)
    {
        $record = Promozione::where('id', $chiave)->firstOrFail();; // Recupera il record dal database
        if(!( !(Assegnazione::where('Operatore', auth()->user()->id)->exists()) || 
        Assegnazione::where('Operatore', auth()->user()->id)->where('Azienda',$record->Azienda)->exists()))
        {
            $message='Accesso negato, autorizzazione mancante. Verrai reindirizzato alla home tra 5 secondi...';
            return view('errors.Error403')->with('err',$message);
        }
        
    // Passa il record alla view utilizzando il metodo with
    return view('forms.modificaPromozione')
        ->with('record', $record);
        
    }
    public function salvamodifichePromo(Request $request,$chiave)
    {   
        $errore_desc='Hai messo troppi caratteri';
        $promo=Promozione::where('id',$chiave)->firstorfail();
       
        $attributi=[
            'NomePromo' => 'required|string|max:255',
            'Azienda' => [
                'required',
                Rule::exists('azienda', 'id'),
            ],
            'DescrizioneSconto' => 'required|string',
            'Tipologia'=>'required',
            'PercentualeSconto' => ['nullable',
            'numeric',
            'required_if:Tipologia,Sconto',
            'min:0',
            'max:100',
            new NullableIfRule('Tipologia',['Sconto', null]),
        ],
            'Scadenza' => 'required|date|date_format:Y-m-d||after:'.now().'|before:2030-01-01'
        ];
        $messaggi=[
            'NomePromo.required' => 'Il Nome promozione è obbligatorio',
            'NomePromo.string' => 'Il Nome promozione deve essere una stringa',
            'NomePromo.max' => 'Il Nome promozione supera i 255 caratteri',
            'Azienda.exists'=>'Un\' Azienda deve esistere nel database',
            'Azienda.required'=>'L\'Azienda è obbligatoria',
            'DescrizioneSconto.required' => 'La Descrizione sconto è obbligatoria',
            'DescrizioneSconto.string' => 'Non hai inserito la Descrizione sconto nel formato tradzionale',
            'Tipologia.required'=>'Devi indicare una Tipologia di promozione',
            'PercentualeSconto.numeric' => 'La Percentuale sconto deve essere un numero tra 0 e 100',
            'PercentualeSconto.min' => 'La Percentuale sconto deve essere un numero tra 0 e 100',
            'PercentualeSconto.max' => 'La Percentuale sconto deve essere un numero tra 0 e 100',
            'PercentualeSconto.required_if' => 'La Percentuale sconto è obbligatoria con Tipologia:Sconto',
            'Scadenza.required' => 'La Scadenza è obbligatoria',
            'Scadenza.date_format'=>'La Scadenza deve avere il seguente formato dd-mm-yyyy',
            'Scadenza.before'=>'La Scadenza deve essere precedente al 01-01-2030',
            'Scadenza.after'=>'La Scadenza deve essere antecedente alla data odierna',
        ];
        $validator = Validator::make($request->all(),$attributi,$messaggi);
    
        if ($validator->fails() ) {
            if(strlen(request('DescrizioneSconto'))>255) return redirect()->back()->withErrors($validator)->with('errorDesc','Descrizione troppo lunga')->withInput();
            return redirect()->back()->withErrors($validator)->withInput();//eventualmente ritorna al form con i messaggi di errore del validator e lascia nel form gli input
        }
        if(strlen(request('DescrizioneSconto'))>255) return redirect()->back()->with('errorDesc','Descrizione troppo lunga')->withInput();
        $nomePro=request('NomePromo');
        $azi=request('Azienda');
        $desc=request('DescrizioneSconto');
        $tip=request('Tipologia');
        $perc=request('PercentualeSconto');
        $scad=request('Scadenza');
        $promo->NomePromo = $nomePro;
        $promo->Azienda = $azi;
        $promo->DescrizioneSconto = $desc;
        $promo->Tipologia=$tip;
        if($perc!=null) $promo->PercentualeSconto = $perc;
        $promo->Scadenza = $scad;
        $promo->save();
        return redirect('/listaPromozioni');
    }

    public function showFaq(){
        return view("faq");
    }

    public function showFormPromozione(){
        return view('forms.aggiungiPromozione');
    }

    public function aggiungiPromozione(Request $request)
    {   
        
        $attributi=[
            'NomePromo' => 'required|string|max:255',
            'Azienda' => [
                'required',
                Rule::exists('azienda', 'id'),
            ],
            'DescrizioneSconto' => 'required|string',
            'Tipologia'=>'required',
            'PercentualeSconto' => ['nullable',
            'numeric',
            'required_if:Tipologia,Sconto',
            'min:0',
            'max:100',
            new NullableIfRule('Tipologia',['Sconto', null]),
        ],
            'Scadenza' => 'required|date|date_format:Y-m-d|after:'.now().'|before:2030-01-01'
        ];
        $messaggi=[
            'NomePromo.required' => 'Il Nome promozione è obbligatorio',
            'NomePromo.string' => 'Il Nome promozione deve essere una stringa',
            'NomePromo.max' => 'Il Nome promozione supera i 255 caratteri',
            'Azienda.exists'=>'Un\' Azienda deve esistere nel database',
            'Azienda.required'=>'L\'Azienda è obbligatoria',
            'DescrizioneSconto.required' => 'La Descrizione sconto è obbligatoria',
            'DescrizioneSconto.string' => 'Non hai inserito la Descrizione sconto nel formato tradzionale',
            'Tipologia.required'=>'Devi indicare una Tipologia di promozione', /*quando il valore del campo "Tipologia" non è "Sconto", la regola 
                                                                                  di validazione richiederà che il campo in validazione sia null.*/ 
            'PercentualeSconto.numeric' => 'La Percentuale sconto deve essere un numero tra 0 e 100',
            'PercentualeSconto.min' => 'La Percentuale sconto deve essere un numero tra 0 e 100',
            'PercentualeSconto.max' => 'La Percentuale sconto deve essere un numero tra 0 e 100',
            'PercentualeSconto.required_if' => 'La Percentuale sconto è obbligatoria con Tipologia:Sconto',
            'Scadenza.required' => 'La Scadenza è obbligatoria',
            'Scadenza.date_format'=>'La Scadenza deve avere il seguente formato dd-mm-yyyy',
            'Scadenza.before'=>'La Scadenza deve essere precedente al 01-01-2030',
            'Scadenza.after'=>'La Scadenza deve essere antecedente alla data odierna',
        ];
        $validator = Validator::make($request->all(),$attributi,$messaggi);
        if ($validator->fails() ) {
            if(strlen(request('DescrizioneSconto'))>255) return redirect()->back()->withErrors($validator)->with('errorDesc','Descrizione troppo lunga')->withInput();
            return redirect()->back()->withErrors($validator)->withInput();//eventualmente ritorna al form con i messaggi di errore del validator e lascia nel form gli input
        }
        if(strlen(request('DescrizioneSconto'))>255) return redirect()->back()->with('errorDesc','Descrizione troppo lunga')->withInput();
        $promozione = new Promozione();
        $nomePro=request('NomePromo');
        $azi=request('Azienda');
        $desc=request('DescrizioneSconto');
        $tip=request('Tipologia');
        $perc=request('PercentualeSconto');
        $scad=request('Scadenza');
        $promozione->NomePromo = $nomePro;
        $promozione->Azienda = $azi;
        $promozione->DescrizioneSconto = $desc;
        $promozione->Tipologia=$tip;
        if($perc!=null) $promozione->PercentualeSconto = $perc;
        $promozione->Scadenza = $scad;
        $promozione->save();
        return redirect('/listaPromozioni');
    ;
} 
    public function assegnaAziende($oper){
        
        $exists=Assegnazione::where('operatore',$oper)->exists();
        if($exists){
            return view('forms.assegnaAz_mod')->with('oper',$oper);
        }
        else return view('forms.assegnaAz')->with('oper',$oper);
    }
    public function assegnaAziende2($oper){
        $operatore=Utente::where('id',$oper)->firstOrFail();
        
        foreach(Azienda::all() as $az)
        {
            $az_val=request('Nome_azienda'.$az->id);
            if($az_val!=null){
                if(!Assegnazione::where('Azienda',$az->id)->where('Operatore',$operatore->id)->exists())
                {$assegn=new Assegnazione();
                $assegn->Operatore=$operatore->id;
                $assegn->Azienda=$az->id;
                $assegn->save();
                }
            }
            else {
                Assegnazione::where('Azienda',$az->id)->where('Operatore',$operatore->id)->delete();
            }
        }
        return redirect('/');
    }
    

}