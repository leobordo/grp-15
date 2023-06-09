<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Validation\Rule;



class AziendeController extends Controller
{
    public function index()
    {   
        return view('gestioneAziende',[
           'aziende'=>Azienda::paginate(5) 
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
        'nome' => 'required|unique:azienda|max:255',
        'tipologia' => 'required',
        'localizzazione' => 'required|max:255',
        'ragioneSociale' => 'required|max:255',
        'descrizione'=>'required',
        'immagine'=>'mimes:jpeg,png,jpg|max:2048|nullable'
        ]);
        if(strlen(request('descrizione'))>255) return redirect()->back()
        ->with('errorDesc','Descrizione troppo lunga')->withInput();

        $azienda= new Azienda();
        $azienda->nome = strip_tags($request->input('nome'));
        $azienda->tipologia = strip_tags($request->input('tipologia'));
        $azienda->localizzazione = strip_tags($request->input('localizzazione'));
        $azienda->ragioneSociale = strip_tags($request->input('ragioneSociale'));
        $azienda->descrizione = strip_tags($request->input('descrizione'));

        if ($request->hasFile('immagine')) {
            $file = $request->file('immagine');
            $fileName = $file->getClientOriginalName();

            $file->move(public_path().'/images', $fileName);
    
            // Salva il percorso dell'immagine nel database
            $azienda->immagine = $fileName;
        }
        
        $azienda->save();
        
        return redirect()->route('gestioneAziende');
        }
        
        

 
        public function show($azienda)
        {
            
            $company = Azienda::where('id',$azienda)->firstorfail();
        
            return view('azienda', [
                'azienda' => $company
            ]);
        }

 
    public function edit($azienda)
    {
        return view('forms.modificaAzienda',[
            'azienda'=>Azienda::where('id',$azienda)->firstorfail()
        ]);
    }

 
    public function update(Request $request, $azienda){
    
        $request->validate([
            'nome' => [
                'required',
                Rule::unique('azienda')->ignore($azienda),
            ],
            'tipologia' => 'required',
            'localizzazione' => 'required|max:255',
            'ragioneSociale' => 'required|max:255',
            'descrizione'=>'required',
            ]);
            if(strlen(request('descrizione'))>255) return redirect()->back()
        ->with('errorDesc','Descrizione troppo lunga')->withInput();
           $to_update = Azienda::where('id',$azienda)->firstorfail();
           $to_update->Nome = $request->input('nome');
           $to_update->Tipologia = $request->input('tipologia');
           $to_update->Localizzazione = $request->input('localizzazione');
           $to_update->RagioneSociale = $request->input('ragioneSociale');
           $to_update->Descrizione = $request->input('descrizione');
           $to_update->save();
           
           return redirect()->route('gestioneAziende');
    
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
    
    $az = Azienda::where('id', $azienda)->first();
    $az->delete();
    return redirect()->route('gestioneAziende');
}
}