@extends('layouts.gestione')

@section('title', 'Cliente')

@section('content')
<script src="{{ asset('js/functions.js') }}"></script>
<br>
<br>
<div class="dati">
    <p>Nome Utente:</p>
    <h1>{{ $Clientee->NomeUtente }}</h1>
    <br>
    <br>
    <br>
    <p>Nome:</p>
    <p class="dato-specifico">{{ $Clientee->Nome }}</p> <!-- tutto quello dentro le graffe significa che viene passato il valore dell'attr Nome di $Clientee -->
    <br>
    <p>Cognome:</p>
    <p class="dato-specifico">{{ $Clientee->cognome }}</p>
    <br>
    <p>E-mail:</p>
    <p class="dato-specifico">{{ $Clientee->Email }}</p>
    <br>
    <p>Telefono:</p>
    <p class="dato-specifico">{{ $Clientee->Telefono }}</p>
    <br>
    <p>Genere:</p>
    <p class="dato-specifico">{{ $Clientee->Genere }}</p>
</div>
<br>
<div class="Bottone_elimina">
    <a href="{{ route('deletecliente', [$Clientee->NomeUtente]) }}" onclick="return confermaEliminazioneCl()">Elimina cliente</a>
</div>
<br>
<br>
@endsection