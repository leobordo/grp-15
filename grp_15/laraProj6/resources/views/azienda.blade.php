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
                    <a href="{{route('modificaAzienda',['aziende'=>$azienda->id])}}" 
                        onclick="event.preventDefault(); document.getElementById('modifica-form-{{$azienda->Nome}}').submit();" >Modifica azienda
                    </a>
                    <form id="modifica-form-{{$azienda->Nome}}" action="{{ route('modificaAzienda', ['aziende' => $azienda->id]) }}" method="GET" style="display: none;">
                    </form>
                  </div>
                  
                  <div class="Bottone_elimina">
                    <a href="{{ route('eliminaAzienda', ['aziende' => $azienda->id]) }}"
                        onclick="event.preventDefault(); document.getElementById('elimina-form-{{$azienda->Nome}}').submit(); return confermaEliminazioneAz()">
                        Elimina azienda
                    </a>
                    <form id="elimina-form-{{$azienda->Nome}}" action="{{ route('eliminaAzienda', ['aziende' => $azienda->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <script>
                    function confermaEliminazioneAz() {
                    var nomeSito = "My little coupony";
                    var conferma = window.confirm(nomeSito + ' dice: Sei sicuro di voler eliminare l\'azienda?');
                    return conferma;
                    }
                    </script>
        @endsection
</body>
</html>