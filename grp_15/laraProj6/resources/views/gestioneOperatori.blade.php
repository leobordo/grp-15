@extends('layouts.gestione')

@section('title','Gestione Operatori')

@section('content')
    <form class="CercaUtenti-form">
        <input type="text" placeholder="Cerca operatore" class="CercaUtenti-input">
        <button type="submit" class="CercaUtenti-bottone">Cerca</button>
      </form>
    <h1>LISTA OPERATORI</h1>
    @isset($operatori)
    <ul>
        @foreach($operatori as $operatore)
                <li><a href="{{ route('operatore', [$operatore->NomeUtente]) }}">Operatore: {{ $operatore->NomeUtente }}</a></li> 
                <!-- passa il valore NoomeUtente alla funzione indicata nella route nominata operatore -->
    </ul>
    @endisset
    <div class="Bottone_aggiungi">
        <a href="{{ route('aggiungioperatore') }}">Aggiungi operatore</a>
    </div>
    <br>
    <br> 
@endsection