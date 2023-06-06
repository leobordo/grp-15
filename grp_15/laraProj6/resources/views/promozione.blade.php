@extends('layouts.gestione')

@section('title','Promozione')

@section('content')
<script src="{{ asset('js/functions.js') }}"></script>
<br>
    <div class="dati">
        <p>Nome Promo:</p>
        <p class="dato-specifico" style="font-size: x-large">
            {{$promozione->NomePromo}}
        </p>
        <br>
        <p>Azienda:</p>
        <p class="dato-specifico" style="font-size: x-large">
            {{$promozione->azienda->Nome}}
        </p>
        <br>
        <p>Descrizione Sconto</p>
        <p class="dato-specifico" style="font-size: large">
            {{$promozione->DescrizioneSconto}}
        </p>
        <br>

        <p>Tipologia:</p>
        <p class="dato-specifico" style="font-size: large">
            {{$promozione->Tipologia}}
        </p>
        <br>
        
        
            @if($promozione->hasPercentuale())
            <p>Percentuale sconto:</p>
            <p class="dato-specifico" style="font-size: x-large">
                {{$promozione->PercentualeSconto}}%
            </p>
            <br>
            @endif
            
        <p>Data di scadenza:</p>
        <p class="dato-specifico" style="font-size: x-large">
            {{$promozione->Scadenza}}
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
        <br>
    </div>
@endsection