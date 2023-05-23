<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consumer;

class UtentiController extends Controller
{
    //Array of static data
      

      public function index()
    {
        return view('utenti.index',[
           'utenti'=>Consumer::all()
        ]);
        
    }

   
    public function create()
    {
        return view('utenti.create');
    }

   
    public function store(Request $request)
    {
        //validazione dei dati inseriti
        $request->validate([
            'password' => 'required',
            'nome' => 'required',
            'cognome' => 'required',
            'email' => 'required',
            'telefono' => ['required', 'integer'],
            'genere' => ['required', 'alpha'],
        ]);
    
            $azienda= new Consumer();
            $azienda->password = strip_tags($request->input('password'));
            $azienda->nome = strip_tags($request->input('nome'));
            $azienda->cognome = strip_tags($request->input('cognome'));
            $azienda->email = strip_tags($request->input('email'));
            $azienda->telefono = strip_tags($request->input('telefono'));
            $azienda->genere = strip_tags($request->input('genere'));
            $azienda->save();
            
            return redirect()->route('utenti.index');
            }

   
    public function show($utente){
       $index = Consumer::findOrFail($utente);
        
        if($index === false){
            abort(404);
        }
        return view('utenti.show', [
            'utente' => $utente[$index]
        ]);
    }
    
    public function edit($utente)
    {
        return view('utenti.edit',[
            'utente'=>Consumer::findorfail($utente)
        ]);
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
