@extends('layout')
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
                    <tr><td>Nome</td><td>{{$azienda['nome']}}</td></tr>
                    <tr><td>Tipologia</td><td>{{$azienda['tipologia']}}</td></tr>
                    <tr><td>Localizzazione</td><td>{{$azienda['localizzazione']}}</td></tr>
                    <tr><td>RagioneSociale</td><td>{{$azienda['ragioneSociale']}}</td></tr>
                    <tr><td>Descrizione</td><td>{{$azienda['descrizione']}}</td></tr>
                </table>
              
              
                  
                  <div class="Bottone_edit">
                    <a href="{{route('aziende.edit',$azienda->id)}}">Modifica azienda</a>
                  </div>
                  
                  <div class="Bottone_elimina">
                    <a href="{{ route('aziende.destroy', $azienda->id) }}">Elimina azienda</a>
                  </div>
        @endsection
</body>
</html>