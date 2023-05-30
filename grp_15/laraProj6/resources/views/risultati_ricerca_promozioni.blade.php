@extends('layouts.gestione')

@section('title','RISULTATI RICERCA')

@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiPromo') }} method='POST'>
    @csrf
    <input type="text" placeholder="Cerca tra le aziende" name='CercaPromo-az' class="CercaPromo-az">
    <input type="text" placeholder="Cerca nella descrizione" name='CercaPromo-descr' class="CercaPromo-descr">
    <button type="submit" class="CercaUtenti-bottone">Cerca</button>
  </form> 
    <h1>LISTA RISULTATI</h1>
    @isset($results)
    <ul>
        @foreach ($results as $result)
            <li><a href="{{ route('promozione2', [$result->id])  }}"> Promozione:{{ $result->NomePromo }}</a></li> 
        @endforeach
    </ul>
    
    @endisset
    
    <br>
    <br>   
@endsection