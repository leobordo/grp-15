@extends('layouts.gestione')

@section('title','RISULTATI RICERCA')

@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiPromo') }} method='GET'>
    <input type="text" placeholder="Cerca promozioni" name='CercaPromo-input' class="CercaPromo-input">
    <button type="submit" class="CercaUtenti-bottone">Cerca</button>
  </form>
    <h1>LISTA RISULTATI</h1>
    @isset($results)
    <ul>
        @foreach ($results as $result)
            <li><a href="{{ route('promozione', [$result->NomePromo])  }}"> Promozione:{{ $result->NomePromo }}</a></li>
            
            
        @endforeach
    </ul>
    
    @endisset
    
    <br>
    <br>   
@endsection