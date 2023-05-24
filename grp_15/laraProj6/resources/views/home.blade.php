
@extends('layouts.gestione')

@section('title','home')
@section('content')
          <form class="CercaUtenti-form"  action={{ route('showRisultatiPromo') }} method='GET'>
            <input type="text" placeholder="Cerca promozioni" name='CercaPromo-input' class="CercaPromo-input">
            <button type="submit" class="CercaUtenti-bottone">Cerca</button>
          </form>
         
          
         
                 
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