
@extends('layouts.gestione')

@section('title','home')
@section('content')
<script src="{{ asset('js/functions.js') }}"></script>
<form class="CercaUtenti-form"  action={{ route('showRisultatiPromo') }} method='POST'>
  @csrf
  <input type="text" placeholder="Cerca tra le aziende" name='CercaPromo-az' class="CercaUtenti-input">
  <input type="text" placeholder="Cerca nella descrizione" name='CercaPromo-descr' class="CercaUtenti-input">
  <button type="submit" class="CercaUtenti-bottone">Cerca</button>
</form>
@if(session('err'))
  <div id="error-message">{{ session('err') }}</div>
  <script>
      setTimeout(function() {
          var errorMessage = document.getElementById('error-message');
          if (errorMessage) {
              errorMessage.style.display = 'none';
          }
      }, 3000);
  </script>
@endif
<!-- controlla se la variabile err è stata impostata nella sessione precedente.
  perchè con il metodo with la variabile di sessione è disponibile solo nella richiesta successiva alla redirect.
  Dunque usiamo session('') per avere subito il valore di err.
REMIND: una sessione è un metodo per salvare dati specifici dell'utente durante la navigazione.
Con with non cambiamo sessione, nemmeno con la redirect. Si cambia sessione con il logout ad esempio, o chiudendo il browser.  --> 
         
<h2>Promozioni</h2>
  <div class="contenitoreHome">
    @foreach($aziende as $azienda)
      <div class="contenitorePromo">
        <div class="AziendaInHome">
          <a class="azienda_ancora" href={{route('azienda2',$azienda->id)}} style="display:inline-block">{{ $azienda->Nome }}</a>
          <img src="./images/{{$azienda->Immagine }}" alt="logo_di_{{ $azienda->Nome }}" style="display: inline-block;   margin-left:20px;height:auto; width:60px">  
        </div>
        @php
          $count = 1; // Contatore per tenere traccia delle promozioni visualizzate
        @endphp
        <div>

         
        @foreach ($promozioni as $promozione)
        
          @if ($promozione->Azienda == $azienda->id && strtotime($promozione->Scadenza) >=strtotime(date('Y-m-d')))
            
            @if ($count <= 6)
              @php
                $count++; // Incrementa il contatore
              @endphp
              <a href="{{ route('promozione2', [$promozione->id]) }}">
              <div class="promoHome">
              <li>
                
                <h2>promo: {{ $promozione->NomePromo }}</h2>
                
              </li>
              <p>Azienda: {{$azienda->Nome}}</p>
              @if($promozione->hasPercentuale())
                <p>Sconti del {{$promozione->PercentualeSconto}}%</p>
              @endif
              
              </div>
            </a>
              @else
              @break
            
           

            @endif
          @endif

        @endforeach
        </div>
        <div id="altrePromo{{$azienda->id}}"  style="display:none;">
          
          
          @foreach($promozioni as $promozione)
              @if ($promozione->Azienda == $azienda->id && strtotime($promozione->Scadenza) >=strtotime(date('Y-m-d')))
             
              @if ($count > 12)
              <a href="{{ route('promozione2', [$promozione->id]) }}">
                <div class="promoHome" >
                  
                <li>
                  
                  <h2>promo: {{ $promozione->NomePromo }}</h2>
                  
                </li>
                <p>Azienda: {{$azienda->Nome}}</p>
                @if($promozione->hasPercentuale())
                  <p>Sconti del {{$promozione->PercentualeSconto}}%</p>
                @endif
                
                </div>
              </a>
                
              
            

              @endif
              @php
                  $count++; // Incrementa il contatore
              @endphp
            @endif

          @endforeach

          
        </div>
        
        @if($count>12)
        <button id="pulsanteAltrePromo{{$azienda->id}}" class="pulsanteAltrePromo"onclick="mostraAltrePromo({{$azienda->id}})">Mostra altre promo</button>
        @endif
        
      </div>
    @endforeach
    <div class="Paginazione">
      {{ $aziende->links('pagination.paginator') }}
    </div>
  </div>            
@endsection