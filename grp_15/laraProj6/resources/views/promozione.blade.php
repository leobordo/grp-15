@extends('layouts.gestione')

@section('title','Promozione')

@section('content')
        <h1>
            {{$promozione->NomePromo}}
        </h1>
        <br>
        <h2>
            {{$promozione->Azienda}}
        </h2>
        <br>
        <h3>
            {{$promozione->DescrizioneSconto}}
        </h3>
        <br>
        <h4>
            {{$promozione->PercentualeSconto}}
        </h4>
        <br>
        <p>
            {{$promozione->Scadenza}}
        </p>
        <br>
        <br>
@endsection