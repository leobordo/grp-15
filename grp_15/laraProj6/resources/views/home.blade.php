
@extends('layouts.gestione')

@section('title','home')
@section('content')
<<<<<<< Updated upstream
          <form class="CercaUtenti-form"  action={{ route('showRisultatiPromo') }} method='GET'>
            <input type="text" placeholder="Cerca promozioni" name='CercaPromo-input' class="CercaPromo-input">
            <button type="submit" class="CercaUtenti-bottone">Cerca</button>
          </form>
         
          
         
=======
          <div class="search-bar">
              <div>
                  <input aria-label="search text" class="searchbar-input sc-ion-searchbar-md" inputmode="search" placeholder="Cerca su  my little coupony" type="search"
                      autocomplete="off" autocorrect="off" wtx-context="14F1BC83-4A5A-444C-A0A9-BB910524D3AE" >
              </div>
              
          </div>
>>>>>>> Stashed changes
                 
                <h2>Promozioni</h2>

                <div class="grid-container">
                    @foreach ($promozioni as $promozione)
                    <div class='promo-container'>
                        <li><a href="{{ route('promozione', [$promozione->NomePromo]) }}">
                            <h2>promo: {{ $promozione->NomePromo }}</h2>
                        </a></li>
                        {{$promozione->Azienda}}
                        <p>Sconti del {{$promozione->PercentualeSconto}}%</p>
                    </div>
                    @endforeach
                </div>
                      
@endsection