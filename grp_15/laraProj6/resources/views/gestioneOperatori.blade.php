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
                <li><a href="operatore.blade.php?username={{ $operatore->NomeUtente }}">Operatore: {{ $operatore->NomeUtente }}</a></li> //uso una query string nell'url per passare l'username
        @endforeach
    </ul>
    @endisset
    <div class="Bottone_aggiungi">
        <a href="form_operatore.blade.php???">Aggiungi operatore</a>
    </div>
    <br>
    <br> 
@endsection