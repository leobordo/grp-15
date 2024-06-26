@extends('layouts.gestione')

@section('title','RISULTATI RICERCA')

@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiCl') }} method='POST'>
    @csrf
    <input type="text" placeholder="Cerca cliente" name='CercaUtenti-input2' class="CercaUtenti-input">
    <button type="submit" class="CercaUtenti-bottone">Cerca</button>
  </form>
    <h1>LISTA RISULTATI</h1>
    @isset($results)
    <ul>
        @foreach ($results as $result)
            <li><a href="{{ route('cliente', [$result->id])  }}" style="float: left;">
                <p style="display: inline-block;">Cliente:</p>
                <p style="display: inline-block;" class="dato-specifico">{{ $result->NomeUtente }}</p>
            </a></li>
        @endforeach
    </ul>
    @endisset
    <br>
    <br>   
@endsection