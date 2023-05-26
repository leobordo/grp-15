

@extends('layouts.gestione')

@section('title','Promozione')

@section('content')
        <h1>
           
            {{$promozione->NomePromo}}
        </h1>
        <br>
        <h2>
            Azienda: {{$promozione->azienda->Nome}}
        </h2>
        <br>
        <h3>
            Descrizione Sconto
        </h3>
        <h3>
            {{$promozione->DescrizioneSconto}}
        </h3>
        <br>
        <h4>
            Percentuale sconto: {{$promozione->PercentualeSconto}}%
        </h4>
        <br>
        <p>
            Data di scadenza: {{$promozione->Scadenza}}
        </p>
        <br>
        @isset(auth()->user()->Livello)<!-- deve controllare se l'utente è autenticato e se ha il permesso di usare i bottoni -->
        @if(auth()->user()->Livello == 2)
        <div class="Bottone_elimina">
            <a href="{{ route('deletepromo' ,[$promozione->id]) }}" onclick="return confermaEliminazionePr()">Elimina promozione</a>
        </div>
        <div class="Bottone_edit">
            <a href="{{ route('modificapromo', [$promozione->id]) }}">Modifica promozione</a>
        </div>
        @endif
        @endisset
        <br>
        <br>
        <script>
               function confermaEliminazionePr() {
                var nomeSito = "My little coupony";
                var conferma = window.confirm(nomeSito + ' dice: Sei sicuro di voler eliminare la promozione?');
                return conferma;
                }
        </script>
@endsection