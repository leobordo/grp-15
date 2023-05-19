@extends('layouts.gestione')

@section('title','Gestione Clienti')

@section('content')
    <form class="CercaUtenti-form">
        <input type="text" placeholder="Cerca cliente" class="CercaUtenti-input">
        <button type="submit" class="CercaUtenti-bottone">Cerca</button>
      </form>
    <h1>LISTA CLIENTI</h1>
    @isset($clienti)
    <ul>
        @foreach($clienti as $cliente)
                <li><a href="operatore.blade.php????">Operatore: {{ $cliente->username }}</a></li>
        @endforeach
    </ul>
    @endisset
    <br>
    <br>   
@endsection