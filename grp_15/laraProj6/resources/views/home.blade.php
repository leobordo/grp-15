
@extends('layouts.gestione')

@section('title','home')
@section('content')
          <div class="search-bar">
              <div>
                  <input aria-label="search text" class="searchbar-input sc-ion-searchbar-md" inputmode="search" placeholder="Cerca su  my little coupony" type="search"
                      autocomplete="off" autocorrect="off" wtx-context="14F1BC83-4A5A-444C-A0A9-BB910524D3AE" >
              </div>
              
          </div>
         
          
         
                 
                    <h2>Promozioni</h2>

                    <div id="grid-container">
                        @foreach ($promozioni as $promozione)
                        <div class='promo-container'>
                            <li><a href="{{ route('promozione', [$promozione->NomePromo]) }}">
                                <h2>promo: {{ $promozione->NomePromo }}</h2>
                                {{$promozione->Azienda}}
                            </a></li>
                        </div>
                        @endforeach
                    </div>
                      
        
         
@endsection