@extends('layouts.aziende')
<!DOCTYPE html>
<html lang="it">
    <head title="Gestione Aziende">
        @section('titolo','gestione aziende')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>

    
    <body>
        @section('contenuto')
        <div class="GestioneClienti">
            <form class="CercaUtenti-form">
                <input type="text" placeholder="Cerca azienda" class="CercaUtenti-input">
                <button type="submit" class="CercaUtenti-bottone">Cerca</button>
              </form>
            <h1>LISTA AZIENDE</h1>
           <div>
            @if (count($aziende) > 0)
            <ul>   
            @foreach ($aziende as $azienda)
            <li><a href="{{route('showAzienda', ['aziende'=> $azienda['Nome']]) }}">Azienda:{{$azienda['Nome']}}</a></li>
            @endforeach
        </ul>
        @else 
        <p>non ci sono aziende per mostrare</p>
        @endif
            <div class="Bottone_aggiungi">
                <a href='{{ route('aggiungiAzienda')}}'>Aggiungi azienda</a>
            </div> 
        <br>
        <br>
        @endsection
        </div>
</body>

</html>