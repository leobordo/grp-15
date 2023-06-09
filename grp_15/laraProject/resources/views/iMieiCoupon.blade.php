@extends('layouts.gestione')

@section('title','I Miei Coupon')

@section('content')
    <br>
    <h1>I MIEI COUPON</h1>
    @isset($coupons)
        <ul>
            @foreach($coupons as $coupon)
                @if ($coupon->Utente === auth()->user()->id)
                    <br>
                    <br>
                    <li><a href="{{ route('coupon', [$coupon->id]) }}" target="_blank">Coupon: {{ $coupon->CodiceCoupon }}</a></li>
                @endif
            @endforeach
        </ul>
        @endisset
        <div class="Paginazione">
            {{ $coupons->links('pagination.paginator') }}
          </div>
@endsection