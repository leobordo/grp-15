
@extends('layouts.gestione')

@section('title','home')
@section('content')
<form class="CercaUtenti-form"  action={{ route('showRisultatiPromo') }} method='POST'>
  @csrf
  <input type="text" placeholder="Cerca tra le aziende" name='CercaPromo-az' class="CercaPromo-az">
  <input type="text" placeholder="Cerca nella descrizione" name='CercaPromo-descr' class="CercaPromo-descr">
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
                    <div class="contenitorePromo">
                      @foreach($aziende as $azienda)
                      <h2>{{ $azienda->Nome }}</h2>

                      @foreach ($promozioni as $promozione)
                      @if ($promozione->Azienda == $azienda->id && strtotime($promozione->Scadenza) >=strtotime(date('Y-m-d')))
                      <div class="promoHome">
                        <li><a href="{{ route('promozione2', [$promozione->id]) }}">
                          <h2>promo: {{ $promozione->NomePromo }}</h2>
                      </a></li>
                      {{$promozione->Azienda}}
                      <p>Sconti del {{$promozione->PercentualeSconto}}%</p>
                      </div>
                      @endif
                    @endforeach  
                    @endforeach
                    </div>
                  <div class="Paginazione">{{ $aziende->links('pagination.paginator') }}</div>
                  </div>
                  
                                               
@endsection