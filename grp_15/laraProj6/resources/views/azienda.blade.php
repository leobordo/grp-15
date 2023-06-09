@extends('layouts.gestione')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('title',$azienda['Nome'])
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
         <script src="{{ asset('js/functions.js') }}"></script>
    </head>
    <body>
        @section('content')
        
        
        <div class="GestioneClienti">
               <br>
               <br>

              <div class="Azienda">
                <table style="border-collapse: separate; border-spacing: 20px;">
                    <tr><td>Nome</td><td class="dato-specifico">{{$azienda['Nome']}}</td></tr>
                    <tr><td>Tipologia</td><td class="dato-specifico">{{$azienda['Tipologia']}}</td></tr>
                    <tr><td>Localizzazione</td><td class="dato-specifico">{{$azienda['Localizzazione']}}</td></tr>
                    <tr><td>RagioneSociale</td><td class="dato-specifico">{{$azienda['RagioneSociale']}}</td></tr>
                    <tr><td>Descrizione</td><td class="dato-specifico; line-height: 1.5;">{{$azienda['Descrizione']}}</td></tr>
                    <tr><td>Logo</td><td class="dato-specifico"><img src="../images/{{$azienda->Immagine }}" alt="logo_di_{{ $azienda->Nome }}" height="50px" style="display: inline-block; margin-left: 10px;"></td></tr>
                </table>
              
              
                  @if(Gate::allows('isAdmin',auth()->user()))
                  <div class="Bottone_edit">
                    <a href="{{route('modificaAzienda',['aziende'=>$azienda->id])}}" 
                         >Modifica azienda
                    </a>
                  </div>
                  <div class="Bottone_elimina">
                    <form id="elimina-form-{{$azienda->id}}" action="{{ route('eliminaAzienda', ['aziende' => $azienda->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confermaElimina()">Elimina Azienda</button>
                    </form>
                </div>
                @endif
                <br>
                <br>
        @endsection
</body>
</html>