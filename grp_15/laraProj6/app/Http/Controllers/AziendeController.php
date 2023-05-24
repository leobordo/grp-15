<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use Illuminate\Http\Request;
use App\Models\Company;

class AziendeController extends Controller
{
    public function index()
    {
        return view('gestioneAziende',[
           'aziende'=>Azienda::all() 
        ]);
        //
    }


    public function create()
    {
        return view('forms.aggiungiAzienda');
    }

  
    public function store(Request $request) {
        
        //validazione dei dati inseriti
        $request->validate([
        'nome' => 'required',
        'tipologia' => 'required',
        'localizzazione' => 'required',
        'ragioneSociale' => 'required',
        'descrizione'=>'required',
        ]);

        $azienda= new Azienda();
        $azienda->nome = strip_tags($request->input('nome'));
        $azienda->tipologia = strip_tags($request->input('tipologia'));
        $azienda->localizzazione = strip_tags($request->input('localizzazione'));
        $azienda->ragioneSociale = strip_tags($request->input('ragioneSociale'));
        $azienda->descrizione = strip_tags($request->input('descrizione'));
        
        $azienda->save();
        
        return redirect()->route('gestioneAziende');
        }
        
        

 
        public function show($azienda)
        {
            $company = Azienda::findOrFail($azienda);
        
            return view('azienda', [
                'azienda' => $company
            ]);
        }

 
    public function edit($azienda)
    {
        return view('forms.modificaAzienda',[
            'azienda'=>Azienda::where('Nome',$azienda)->firstorfail()
        ]);
    }

 
    public function update(Request $request, $azienda){
        $request->validate([
            'nome' => 'required',
            'tipologia' => 'required',
            'localizzazione' => 'required',
            'ragioneSociale' => 'required',
            'descrizione'=>'required',
            ]);
           $to_update = Azienda::where('Nome',$azienda)->firstorfail();
           
           $to_update->Nome = $request->input('nome');
           $to_update->Tipologia = $request->input('tipologia');
           $to_update->Localizzazione = $request->input('localizzazione');
           $to_update->RagioneSociale = $request->input('ragioneSociale');
           $to_update->Descrizione = $request->input('descrizione');
           $to_update->save();
        
           return redirect()->route('showAzienda',['aziende'=>$to_update->Nome]);
    
           /*
           manca l'immagine!
           */
        }

   /* public function destroy($azienda){
        $to_delete = Company::findorfail($azienda);
        $to_delete->delete();
        return redirect()->route('aziende.index',$azienda);
        //
    }*/
    public function destroy($azienda)
{
    // Trova l'azienda nel database
    
    $az = Azienda::where('Nome', $azienda)->first();
    $az->delete();
    return redirect()->route('gestioneAziende');
}
}