@extends('layouts.gestione')

@section('title', 'Il Mio Profilo')

@section('content')
<br>
<h1>Il mio profilo</h1>
<br>
<br>
<br>
<p>Nome utente:</p>
<p>{{ $Profiloo->NomeUtente }}</p>
<p>Nome:</p>
<p>{{ $Profiloo->Nome }}</p> <!-- tutto quello dentro le graffe significa che viene passato il valore dell'attr Nome di $Clientee -->
<p>Cognome:</p>
<p>{{ $Profiloo->cognome }}</p>
<p>E-mail:</p>
<p>{{ $Profiloo->Email }}</p>
<p>Telefono:</p>
<p>{{ $Profiloo->Telefono }}</p>
<p>Genere:</p>
<p>{{ $Profiloo->Genere }}</p>

<br>
<div class="Bottone_elimina">
    <a href="{{ route('deleteprofilo', [$Profiloo->NomeUtente]) }}" onclick="return confermaEliminazionePr()">Elimina Profilo</a>
</div>
<div class="Bottone_edit">
    <a href="{{ route('modificaprofilo', [$Profiloo->id]) }}">Modifica profilo</a>
</div>
<br>
<br>
<script>
       function confermaEliminazionePr() {
    var nomeSito = "My little coupony";
    var conferma = window.confirm(nomeSito + ' dice: Sei sicuro di voler eliminare il tuo account?');
    return conferma;
}
</script>
@endsection