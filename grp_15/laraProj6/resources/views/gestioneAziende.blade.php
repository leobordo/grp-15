@extends('layouts.gestione')
<!DOCTYPE html>
<html lang="it">
    <head title="Gestione Aziende">
        @section('titolo','gestione aziende')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>

    
    <body>
        @section('content')
        <div class="GestioneClienti">
            
            <form class="CercaUtenti-form" action={{ route('showRisultatiAz') }} method='POST'>
                @csrf
                <input type="text" placeholder="Cerca azienda" name="CercaAziende-input" class="CercaUtenti-input">
                <button type="submit" class="CercaUtenti-bottone">Cerca</button>
              </form>
                @if(session('err'))
                    <div id="error-message">{{ session('err') }}</div>
                    <script>
                        setTimeout(function() {
                            var errorMessage = document.getElementById('error-message');
                            if (errorMessage) {
                                errorMessage.style.display = 'none';
                            }
                        }, 3000);
                    </script>
                @endif
            <h1>LISTA AZIENDE</h1>
           <div>
            @if (count($aziende) > 0)
            <ul class="GestioneOpAz">   
            @foreach ($aziende as $azienda)
            <li>
                <a href="{{route('showAzienda', ['aziende'=> $azienda['id']]) }}" style="float: left;">
                    <p style="display: inline-block;">Azienda:</p>
                    <p style="display: inline-block;" class="dato-specifico">{{$azienda['Nome']}}</p>
                    <img src="./images/{{$azienda->Immagine }}" alt="logo_di_{{ $azienda->Nome }}" height="20px" style="display: inline-block; margin-left: 5px;">
                </a>
            </li>
            <br>
            @endforeach
        </ul>
        @else 
        <p>non ci sono aziende per mostrare</p>
        @endif
        <div class="Paginazione" style="display:inline-block">{{ $aziende->links('pagination.paginator') }}</div>
        <a class="Bottone_aggiungi" style="display: inline-block" href='{{ route('aggiungiAzienda')}}'>Aggiungi azienda</a>
        <br>
        <br>
        
        @endsection
        </div>
</body>

</html>