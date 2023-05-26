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
            <li><a href="{{ route('showAzienda', [$result->id]) }}">Azienda:{{ $result->Nome }}</a></li>
        @endforeach
    </ul>
    @endisset
    <br>
    <br>   
@endsection