@extends('layouts.gestione')

@section('title','Gestione Operatori')

@section('content')
    <form class="CercaUtenti-form"  action={{ route('showRisultatiOp') }} method='GET'>
        <input type="text" placeholder="Cerca operatore" name='CercaUtenti-input' class="CercaUtenti-input">
        <button type="submit" class="CercaUtenti-bottone">Cerca</button>
      </form>
    <h1>LISTA OPERATORI</h1>
    @isset($operatori)
    <ul>
        @foreach($operatori as $operatore)
                <li><a href="{{ route('operatore', [$operatore->id]) }}">Operatore: {{ $operatore ->NomeUtente }}</a></li> 
                <!-- passa il valore NoomeUtente alla funzione indicata nella route nominata operatore -->
        @endforeach
    </ul>
    @endisset
    <div class="Bottone_aggiungi">
        <a href="{{ route('aggiungioperatore') }}">Aggiungi operatore</a>
    </div>
    <br>
    <br> 
@endsection