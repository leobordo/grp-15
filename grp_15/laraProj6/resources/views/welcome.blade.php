
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
{{session('err')}}
<!-- controlla se la variabile err è stata impostata nella sessione precedente.
  perchè con il metodo with la variabile di sessione è disponibile solo nella richiesta successiva alla redirect.
  Dunque usiamo session('') per avere subito il valore di err.
REMIND: una sessione è un metodo per salvare dati specifici dell'utente durante la navigazione.
Con with non cambiamo sessione, nemmeno con la redirect. Si cambia sessione con il logout ad esempio, o chiudendo il browser.  -->
@endif   
          <h2>Promozioni</h2>

                    @foreach ($promozioni as $promozione)
                        <li><a href="{{ route('promozione2', [$promozione->id]) }}">
                            <h2>promo: {{ $promozione->NomePromo }}</h2>
                        </a></li>
                        {{$promozione->Azienda}}
                        <p>Sconti del {{$promozione->PercentualeSconto}}%</p>
                    @endforeach                              
@endsection