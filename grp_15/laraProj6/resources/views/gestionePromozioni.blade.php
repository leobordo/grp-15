@extends('layouts.gestione')

@section('title','Gestione Promozioni')

@section('content')
    <h1>LISTA PROMOZIONI</h1>
    @isset($promozioni)
    <ul>
        @foreach($promozioni as $promozione)
                <li><a href="{{ route('promozione', [$promozione->NomePromo]) }}">Promozione: {{ $promozione ->NomePromo }}</a></li> 
                <!-- passa il valore NomePromo alla funzione indicata nella route nominata operatore -->
        @endforeach
    </ul>
    @endisset
    <div class="Bottone_aggiungi">
        <a href="{{ route('aggiungipromozione') }}">Aggiungi promozione</a>
    </div>
    <br>
    <br> 
@endsection