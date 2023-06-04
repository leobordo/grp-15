@extends('layouts.gestione')

@section('title','Promozione')

@section('content')
<script src="{{ asset('js/functions.js') }}"></script>
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
            @if($promozione->hasPercentuale())
            Percentuale sconto: {{$promozione->PercentualeSconto}}%
            @endif
        </h4>
        <br>
        <p>
            Data di scadenza: {{$promozione->Scadenza}}
        </p>
        <br>
        @isset(auth()->user()->Livello)<!-- deve controllare se l'utente è autenticato e se ha il permesso di usare i bottoni -->
        @if(Gate::allows('isCliente',auth()->user()))
        @if(!auth()->user()->coupons()->where('Promozione', $promozione->id)->exists())
        <div class="Bottone_aggiungi">
            <a href="{{ route('getCoupon',['chiave' => $promozione->id]) }}"
                 onclick="openLink(event, '{{ route('getCoupon',['chiave' => $promozione->id]) }}')">Genera coupon</a>
        </div>
        @else <div class="Coupon_generato"><a href="{{route('iMieiCoupon')}}">Hai già generato un coupon per questa promo</a></div>
        @endif
        @endif
        @if(Gate::allows('isOperatore',auth()->user()))
        <div class="Bottone_elimina">
            <a href="{{ route('deletepromo' ,[$promozione->id]) }}" onclick="return confermaEliminazionePr()">Elimina promozione</a>
        </div>
        
        @if(strtotime($promozione->Scadenza) >= strtotime(date('Y-m-d')))
        <div class="Bottone_edit">
            <a href="{{ route('modificapromo', [$promozione->id]) }}">Modifica promozione</a>
        </div>
        @endif
        @endif
        @endisset
        <br>
        <br>
@endsection