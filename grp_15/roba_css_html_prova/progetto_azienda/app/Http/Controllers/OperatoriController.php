<?php

namespace App\Http\Controllers;

use App\Models\Operator;
use Illuminate\Http\Request;

class OperatoriController extends Controller
{
   
      public function index()
    {
        return view('operatori.index',[
           'operatori'=>Operator::all()
        ]);
        //
    }

    
    public function create()
    {
        return view('operatori.create');
        //
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
    
            $azienda= new Operator();
            $azienda->password = strip_tags($request->input('password'));
            $azienda->nome = strip_tags($request->input('nome'));
            $azienda->cognome = strip_tags($request->input('cognome'));
            $azienda->email = strip_tags($request->input('email'));
            $azienda->telefono = strip_tags($request->input('telefono'));
            $azienda->genere = strip_tags($request->input('genere'));
            $azienda->save();
            
            return redirect()->route('operatori.index');
            }
            public function show($operatore){
                $index = Operator::findOrFail($operatore);
                 
                 if($index === false){
                     abort(404);
                 }
                 return view('operatori.show', [
                     'utente' => $operatore[$index]
                 ]);
             }
            public function edit($operatore)
            {
                return view('operatori.edit',[
                    'operatore'=>Operator::findorfail($operatore)
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
