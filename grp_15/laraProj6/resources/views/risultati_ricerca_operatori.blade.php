@extends('layouts.gestione')

@section('title','RISULTATI RICERCA')

@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiOp') }} method='POST'>
    @csrf
    <input type="text" placeholder="Cerca operatore" name='CercaUtenti-input' class="CercaUtenti-input">
    <button type="submit" class="CercaUtenti-bottone">Cerca</button>
  </form>
    <h1>LISTA RISULTATI</h1>
    @isset($results)
    <ul>
        @foreach ($results as $result)
            <li><a href="{{ route('operatore', [$result->id])  }}" style="float: left;">
                <p style="display: inline-block;">Operatore:</p>
                <p style="display: inline-block;" class="dato-specifico">{{ $result->NomeUtente }}</p>
            </a></li>
        @endforeach
    </ul>
    @endisset
    <br>
    <br>   
@endsection