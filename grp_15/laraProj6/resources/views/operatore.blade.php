@extends('layouts.iscritti')

@section('title', 'Operatore')

@section('content')
<script src="{{ asset('js/functions.js') }}"></script>
<br>
<h1>OPERATORE</h1>
<br>
<br>
<br>

<p>Nome:</p>
<p>{{ $Operatoree->Nome }}</p> <!-- tutto quello dentro le graffe significa che viene passato il valore dell'attr Nome di $Operatoree -->
<p>Cognome:</p>
<p>{{ $Operatoree->cognome }}</p>
<p>E-mail:</p>
<p>{{ $Operatoree->Email }}</p>
<p>Telefono:</p>
<p>{{ $Operatoree->Telefono }}</p>
<p>Genere:</p>
<p>{{ $Operatoree->Genere }}</p>

<br>
<div class="Bottone_elimina">
    <a href="{{ route('deleteoperatore' ,[$Operatoree->id]) }}" onclick=" return confermaEliminazioneOp()">Elimina operatore</a>
</div>
<div class="Bottone_edit">
    <a href="{{ route('modificaoperatore', [$Operatoree->id]) }}">Modifica operatore</a>
</div>
<br>
<br>
@endsection