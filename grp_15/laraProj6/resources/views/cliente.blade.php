@extends('iscritti.gestione')

@section('title', 'Cliente')

@section('content')
<br>
<h1>CLIENTE</h1>
<br>
<br>
<br>

<p>Nome:</p>
<p>{{ $CLientee->Nome }}</p> <!-- tutto quello dentro le graffe significa che viene passato il valore dell'attr Nome di $Clientee -->
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
    <a href="funzione che cancella l'operatore">Elimina operatore</a>
</div>
<br>
<br>
@endsection