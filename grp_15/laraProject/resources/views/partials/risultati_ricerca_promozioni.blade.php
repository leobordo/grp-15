@isset($err)
  <div id="error-message">{{ $err }}</div>
@endisset
<ul>
    @foreach ($results as $result)
    @if (strtotime($result->Scadenza) >=strtotime(date('Y-m-d')))
        <li><a href="{{ route('promozione2', [$result->id]) }}" style="float: left;">
                <p style="display: inline-block;">Promozione:</p>
                <p style="display: inline-block;" class="dato-specifico">{{ $result->NomePromo }}</p>
            </a></li>
    @endif
    @endforeach
</ul>