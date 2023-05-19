@extends('iscritti.gestione')

{{$op= Utentelivello2::find(request()->query(NomeUtente))}}

@section('title', 'Operatore')

@section('content')
<br>
<h1>OPERATORE</h1>
<br>
<br>
<br>

<p>Nome:</p>
<p>{{ $op->Nome }}</p>
<p>Cognome:</p>
<p>{{ $op->cognome }}</p>
<p>E-mail:</p>
<p>{{ $op->E-mail }}</p>
<p>Telefono:</p>
<p>{{ $op->Telefono }}</p>
<p>Genere:</p>
<p>{{ $op->Genere }}</p>

<br>
<div class="Bottone_elimina">
    <a href="funzione che cancella l'operatore">Elimina operatore</a>
</div>
<div class="Bottone_edit">
    <a href="funzione che modifica l'operatore">Modifica operatore</a>
</div>
<br>
<br>
@endsection