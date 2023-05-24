@extends('layouts.gestione')

@section('title','Promozione')

@section('content')
        <h1>
            {{$promozione->NomePromo}}
        </h1>
        <br>
        <h2>
            {{$promozione->DescrizioneSconto}}
        </h2>
        <br>
        <h3>
            Descrizione Sconto
        </h3>
        <br>
        <h4>
            Percentuale Sconto
        </h4>
        <br>
        <p>
            Scadenza
        </p>
        <br>
        <p>
            Le modalità di fruizione
        </p>
        <br>
@endsection