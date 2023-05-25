
@extends('layouts.gestione')

@section('title','home')
@section('content')
          <form class="CercaUtenti-form"  action={{ route('showRisultatiPromo') }} method='GET'>
            <input type="text" placeholder="Cerca promozioni" name='CercaPromo-input' class="CercaPromo-input">
            <button type="submit" class="CercaUtenti-bottone">Cerca</button>
          </form>    
          <h2>Promozioni</h2>

                    @foreach ($promozioni as $promozione)
                        <li><a href="{{ route('promozione_guest', [$promozione->id]) }}">
                            <h2>promo: {{ $promozione->NomePromo }}</h2>
                        </a></li>
                        {{$promozione->Azienda}}
                        <p>Sconti del {{$promozione->PercentualeSconto}}%</p>
                    @endforeach                              
@endsection