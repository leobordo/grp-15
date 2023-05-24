@extends('layouts.gestione')

@section('title','Promozione')

@section('content')
        <h1>
            {{$promozione->NomePromo}}
        </h1>
        <br>
        <h2>
            Azienda: {{$promozione->Azienda}}
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
        <br>
@endsection