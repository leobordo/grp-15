@extends('layouts.gestione')

@section('title', 'Il Mio Profilo')

@section('content')
<script src="{{ asset('js/functions.js') }}"></script>
<br>
<h1>Il mio profilo</h1>
@if(session('err'))
<div id="error-message">{{ session('err') }}</div>
@endif
<br>
<div class="dati">
    <p>Nome utente:</p>
    <p class="dato-specifico">{{ $Profiloo->NomeUtente }}</p>
    <br>
    <p class="dato-specifico">Nome:</p>
    <p>{{ $Profiloo->Nome }}</p> <!-- tutto quello dentro le graffe significa che viene passato il valore dell'attr Nome di $Clientee -->
    <br>
    <p>Cognome:</p>
    <p class="dato-specifico">{{ $Profiloo->cognome }}</p>
    <br>
    <p>E-mail:</p>
    <p class="dato-specifico">{{ $Profiloo->Email }}</p>
    <br>
    <p>Telefono:</p>
    <p class="dato-specifico">{{ $Profiloo->Telefono }}</p>
    <br>
    <p>Genere:</p>
    <p class="dato-specifico">{{ $Profiloo->Genere }}</p>
</div>
<br>

<div class="Bottone_edit">
    <a href="{{ route('modificaprofilo', [$Profiloo->id]) }}">Modifica profilo</a>
</div>
<br>
<br>

@endsection