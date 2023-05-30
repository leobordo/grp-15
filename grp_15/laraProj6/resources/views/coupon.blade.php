<?php $promozione = \App\Models\Promozione::find($coupon->Promozione) ?>
<?php $azienda = \App\Models\Azienda::find($promozione->Azienda) ?>
<?php $utente = \App\Models\Utente::find($coupon->Utente) ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <title>Coupon</title>
    </head>
        <body class="GestioneClienti">
            <br>
            <br>
        <p>Codice Coupon</p>
        <h1>
            {{$coupon->CodiceCoupon}}
        </h1>
        <br>
        <p>Promozione</p>
        <h2>
            {{ $promozione->NomePromo }}
        </h2>
        <br>
        <p>Descrizione sconto</p>
        <h3>
            {{  $promozione->DescrizioneSconto }}
        </h3>
        <br>
        @if ($promozione->PercentualeSconto>=0)
            <p>Percentuale sconto</p>
            <h3> Sconto del {{  $promozione->PercentualeSconto   }}%</h3>
            @else
        @endif
        <br>
        <p>Scadenza</p>
        <h2>
            {{  $promozione->Scadenza    }}
        </h2>
        <br>
        <p>Azienda</p>
        <h2>
            {{ $azienda->Nome}}
        </h2>
        <br>
        <p>Nome Utente</p>
        <h2>
            {{ $utente->NomeUtente}}
        </h2>
        <br>
        <p>Data e ora</p>
        <h4>{{$coupon->Data}}</h4>
        <h4>{{$coupon->Ora}}</h4>
    </body>
</html>