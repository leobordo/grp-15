@extends('layouts.gestione')

@section('title','Gestione Clienti')

@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiCl') }} method='POST'>
    @csrf
    <input type="text" placeholder="Cerca cliente" name='CercaUtenti-input2' class="CercaUtenti-input">
    <button type="submit" class="CercaUtenti-bottone">Cerca</button>
  </form>
  @if(session('err'))
  {{session('err')}}
  @endif
    <h1>LISTA CLIENTI</h1>
    @isset($clienti)
    <ul>
        @foreach($clienti as $cliente)
                <li><a href="{{ route('cliente', [$cliente->id]) }}">Cliente: {{ $cliente->NomeUtente }}</a></li>
        @endforeach
    </ul>
    @endisset
    <br>
    <br>   
@endsection