
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
                      <div style="display: inline-block;">
                      <h2 style="float: left;">{{ $azienda->Nome }}</h2>
<img src="./images/{{$azienda->Immagine }}" alt="logo_di_{{ $azienda->Nome }}" height="50px" style="display: inline-block; margin-left: 10px;">  
                      </div>
                      @foreach ($promozioni as $promozione)
                      @if ($promozione->Azienda == $azienda->id && strtotime($promozione->Scadenza) >=strtotime(date('Y-m-d')))
                      <div class="promoHome">
                        <li><a href="{{ route('promozione2', [$promozione->id]) }}">
                          <h2>promo: {{ $promozione->NomePromo }}</h2>
                      </a></li>
                      <p>Azienda:{{$azienda->Nome}}</p>
                      @if($promozione->hasPercentuale())
                      <p>Sconti del {{$promozione->PercentualeSconto}}%</p>
                      @endif
                      </div>
                      @endif
                    @endforeach  
                    @endforeach
                    </div>
                  <div class="Paginazione">{{ $aziende->links('pagination.paginator') }}</div>
                  </div>
                  
                                               
@endsection