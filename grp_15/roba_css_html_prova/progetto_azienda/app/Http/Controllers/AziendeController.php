<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class AziendeController extends Controller
{
    public function index()
    {
        return view('aziende.index',[
           'aziende'=>Company::all() 
        ]);
        //
    }


    public function create()
    {
        return view('aziende.create');
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

        $azienda= new Company();
        $azienda->nome = strip_tags($request->input('nome'));
        $azienda->tipologia = strip_tags($request->input('tipologia'));
        $azienda->localizzazione = strip_tags($request->input('localizzazione'));
        $azienda->ragioneSociale = strip_tags($request->input('ragioneSociale'));
        $azienda->descrizione = strip_tags($request->input('descrizione'));
        
        $azienda->save();
        
        return redirect()->route('aziende.index');
        }
        
        

 
        public function show($azienda)
        {
            $company = Company::findOrFail($azienda);
        
            return view('aziende.show', [
                'azienda' => $company
            ]);
        }

 
    public function edit($azienda)
    {
        return view('aziende.edit',[
            'azienda'=>Company::findorfail($azienda)
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
           $to_update = Company::findorfail($azienda);
           
           $to_update->nome = strip_tags($request->input('nome'));
           $to_update->tipologia = strip_tags($request->input('tipologia'));
           $to_update->localizzazione = strip_tags($request->input('localizzazione'));
           $to_update->ragioneSociale = strip_tags($request->input('ragioneSociale'));
           $to_update->descrizione = strip_tags($request->input('descrizione'));
           $to_update->save();
        
           return redirect()->route('aziende.show',$azienda);
    
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
    $azienda = Company::findorfail($azienda);
    
    // Verifica se l'azienda esiste
    if ($azienda) {
        // Cancella l'azienda dal database
        $azienda->delete();
        
        // Reindirizza l'utente alla pagina desiderata dopo l'eliminazione
        return redirect()->route('aziende.index',$azienda);
    }
}
}
