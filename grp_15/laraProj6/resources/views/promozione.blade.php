

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
        <div class="Bottone_elimina">
            <a href="{{ route('deletepromo' ,[$promozione->id]) }}">Elimina promozione</a>
        </div>
        <div class="Bottone_edit">
            <a href="{{ route('modificapromo', [$promozione->id]) }}">Modifica promozione</a>
        </div>
        <br>
        <br>
@endsection