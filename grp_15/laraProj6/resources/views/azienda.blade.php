@extends('layouts.aziende')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('titolo','azienda')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>
    <body>
        @section('contenuto')
        <div class="GestioneClienti">
               <br>
               <br>

              <div class="Azienda">
                <table>
                    <tr><td>Nome</td><td>{{$azienda['Nome']}}</td></tr>
                    <tr><td>Tipologia</td><td>{{$azienda['Tipologia']}}</td></tr>
                    <tr><td>Localizzazione</td><td>{{$azienda['Localizzazione']}}</td></tr>
                    <tr><td>RagioneSociale</td><td>{{$azienda['RagioneSociale']}}</td></tr>
                    <tr><td>Descrizione</td><td>{{$azienda['Descrizione']}}</td></tr>
                </table>
              
              
                  
                  <div class="Bottone_edit">
                    <a href="{{route('modificaAzienda',['aziende'=>$azienda->Nome])}}" 
                        onclick="event.preventDefault(); document.getElementById('modifica-form-{{$azienda->Nome}}').submit();" >Modifica azienda
                    </a>
                    <form id="modifica-form-{{$azienda->Nome}}" action="{{ route('modificaAzienda', ['aziende' => $azienda->Nome]) }}" method="GET" style="display: none;">
                    </form>
                  </div>
                  
                  <div class="Bottone_elimina">
                    <a href="{{ route('eliminaAzienda', ['aziende' => $azienda->Nome]) }}"
                        onclick="event.preventDefault(); document.getElementById('elimina-form-{{$azienda->Nome}}').submit();">
                        Elimina azienda
                    </a>
                    <form id="elimina-form-{{$azienda->Nome}}" action="{{ route('eliminaAzienda', ['aziende' => $azienda->Nome]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                
        @endsection
</body>
</html>