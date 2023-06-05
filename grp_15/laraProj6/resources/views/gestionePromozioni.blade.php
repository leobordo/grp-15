@extends('layouts.gestione')

@section('title','Gestione Promozioni')

@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiPromo') }} method='POST'>
    @csrf
    <input type="text" placeholder="Cerca tra le aziende" name='CercaPromo-az' class="CercaUtenti-input">
    <input type="text" placeholder="Cerca nella descrizione" name='CercaPromo-descr' class="CercaUtenti-input">
    <button type="submit" class="CercaUtenti-bottone">Cerca</button>
  </form> 
  
    <h1>LISTA PROMOZIONI</h1>
    @isset($promozioni)
    <ul>
        @foreach($promozioni as $promozione)
                
                <li><a href="{{ route('promozione', [$promozione->id]) }}">Promozione: {{ $promozione ->NomePromo }}</a></li> 
                <!-- passa il valore NomePromo alla funzione indicata nella route nominata operatore -->
        @endforeach
    </ul>
    @endisset
    <div class="Paginazione">{{ $promozioni->links('pagination.paginator') }}</div>
    <a class="Bottone_aggiungi" href="{{ route('aggiungipromozione') }}">Aggiungi promozione</a>
    <br>
    <br> 
@endsection