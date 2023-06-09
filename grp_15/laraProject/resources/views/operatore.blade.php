@extends('layouts.gestione')

@section('title', 'Operatore')

@section('content')
<script src="{{ asset('js/functions.js') }}"></script>
<br>
<br>
<div class="dati">
    <p>Nome Utente:</p>
    <h1>{{ $Operatoree->NomeUtente }}</h1>
    <br>
    <br>
    <br>
    <p>Nome:</p>
    <p class="dato-specifico">{{ $Operatoree->Nome }}</p> <!-- tutto quello dentro le graffe significa che viene passato il valore dell'attr Nome di $Operatoree -->
    <br>
    <p>Cognome:</p>
    <p class="dato-specifico">{{ $Operatoree->cognome }}</p>
    <br>
    <p>E-mail:</p>
    <p class="dato-specifico">{{ $Operatoree->Email }}</p>
    <br>
    <p>Telefono:</p>
    <p class="dato-specifico">{{ $Operatoree->Telefono }}</p>
    <br>
    <p>Genere:</p>
    <p class="dato-specifico">{{ $Operatoree->Genere }}</p>
</div>
<br>
<div class="Bottone_elimina">
    <a href="{{ route('deleteoperatore' ,[$Operatoree->id]) }}" onclick=" return confermaEliminazioneOp()">Elimina operatore</a>
</div>
<div class="Bottone_aziende">
    <a href="{{ route('assegnaaziende', [$Operatoree->id]) }}">Assegna aziende</a>
</div>
<div class="Bottone_edit">
    <a href="{{ route('modificaoperatore', [$Operatoree->id]) }}">Modifica operatore</a>
</div>
<br>
<br>
@endsection