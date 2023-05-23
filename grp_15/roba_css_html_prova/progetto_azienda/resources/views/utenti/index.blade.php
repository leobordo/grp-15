@extends('layout')
<!DOCTYPE html>
<html lang="it">
    <head title="Gestione utente">
        <title>Gestione utente</title>
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>

    <body>
        @section('contenuto')
        <div class="GestioneClienti">
            <form class="CercaUtenti-form">
                <input type="text" placeholder="Cerca azienda" class="CercaUtenti-input">
                <button type="submit" class="CercaUtenti-bottone">Cerca</button>
              </form>
            <h1>LISTA UTENTI</h1>
           <div>
            @if (count($utenti) > 0)
    <ul> 
        @foreach ($utenti as $utente)
            <li><a href="{{route('utenti.show',['utenti'=> $utente['id']]) }}">{{$utente['nome']}}</a></li>
        @endforeach
    </ul>
@else 
    <p>non ci sono utenti da mostrare</p>
    @endif

    <div class="Bottone_aggiungi">
        <a href='{{ route('utenti.create')}}'>Aggiungi utente</a>
    </div> 
    <br>
    <br>
    @endsection
    </div>
    </body>
    
    </html>