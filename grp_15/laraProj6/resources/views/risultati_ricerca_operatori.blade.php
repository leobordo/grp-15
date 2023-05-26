@extends('layouts.gestione')

@section('title','RISULTATI RICERCA')

@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiOp') }} method='GET'>
    <input type="text" placeholder="Cerca operatore" name='CercaUtenti-input' class="CercaUtenti-input">
    <button type="submit" class="CercaUtenti-bottone">Cerca</button>
  </form>
    <h1>LISTA RISULTATI</h1>
    @isset($results)
    <ul>
        @foreach ($results as $result)
            <li><a href="{{ route('operatore', [$result->id])  }}"> Operatore:{{ $result->NomeUtente }}</a></li>
        @endforeach
    </ul>
    @endisset
    <br>
    <br>   
@endsection