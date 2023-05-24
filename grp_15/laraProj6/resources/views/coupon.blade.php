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
        <h1>
            {{$coupon->CodiceCoupon}}
        </h1>
        <br>
        <h2>
            {{$coupon->Promozione}}
        </h2>
        <br>
        <h3>
            Azienda
        </h3>
        <h3>
            Nome Utente
        </h3>
        <br>
        <br>
        <p>{{$coupon->Data}}</p>
        <p>{{$coupon->Ora}}</p>
    </body>
</html>