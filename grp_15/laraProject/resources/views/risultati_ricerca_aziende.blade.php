@extends('layouts.gestione')

@section('title','RISULTATI RICERCA')

@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiAz') }} method='POST'>
    @csrf
    <input type="text" placeholder="Cerca azienda" name='CercaAziende-input' class="CercaAziende-input">
    <button type="submit" class="CercaUtenti-bottone">Cerca</button>
  </form>
    <h1>LISTA RISULTATI</h1>
    @isset($results)
    <ul>
        @foreach ($results as $result)
            <li><a href="{{ route('showAzienda', [$result->id]) }}" style="float: left;">
                <p style="display: inline-block;">Azienda:</p>
                <p style="display: inline-block;" class="dato-specifico">{{ $result->Nome }}</p>
            </a></li>
        @endforeach
    </ul>
    @endisset
    <br>
    <br>   
@endsection