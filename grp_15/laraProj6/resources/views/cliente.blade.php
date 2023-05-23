@extends('layouts.gestione')

@section('title', 'Cliente')

@section('content')
<br>
<h1>CLIENTE</h1>
<br>
<br>
<br>

<p>Nome:</p>
<p>{{ $Clientee->Nome }}</p> <!-- tutto quello dentro le graffe significa che viene passato il valore dell'attr Nome di $Clientee -->
<p>Cognome:</p>
<p>{{ $Clientee->cognome }}</p>
<p>E-mail:</p>
<p>{{ $Clientee->Email }}</p>
<p>Telefono:</p>
<p>{{ $Clientee->Telefono }}</p>
<p>Genere:</p>
<p>{{ $Clientee->Genere }}</p>

<br>
<div class="Bottone_elimina">
    <a href="{{ route('deletecliente', [$Clientee->NomeUtente]) }}">Elimina cliente</a>
</div>
<br>
<br>
@endsection