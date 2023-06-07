@extends('layouts.gestione')

@section('title','RISULTATI RICERCA')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('#formRicercaPromozioni').on('input autocompleteselect keyup', function(event) {
      event.preventDefault();

      var formData = $(this).serialize();

      $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,

        success: function(response) {
          $('#risultatiRicerca').html(response);
        },
        error: function() {
          alert('Si è verificato un errore durante la ricerca delle promozioni.');
        }
      });
    });
    // Recupera l'elenco dei suggerimenti dal server
    $.ajax({
        url: '{{ route('getSuggerimenti') }}',
        success: function(data) {
            // Inizializza l'autocompletamento
            $('#Azienda_input').autocomplete({
                source: data,
                minLength: 2 // Numero minimo di caratteri per visualizzare i suggerimenti
            });
        }
    });
});
</script>

<form class="CercaUtenti-form" id="formRicercaPromozioni" action="{{ route('showRisultatiPromo') }}" method="POST">
  @csrf
  <input type="text" id="Azienda_input" placeholder="Cerca tra le aziende" name="CercaPromo-az" class="CercaUtenti-input suggerimenti-lista">
  <input type="text" placeholder="Cerca nella descrizione" name="CercaPromo-descr" class="CercaUtenti-input">
  <button type="submit" class="CercaUtenti-bottone">Cerca</button>
</form>

<h1>LISTA RISULTATI</h1>

<div id="risultatiRicerca">
  @isset($results)
  <ul>
    @foreach ($results as $result)
    <li><a href="{{ route('promozione2', [$result->id]) }}" style="float: left;">
        <p style="display: inline-block;">Promozione:</p>
        <p style="display: inline-block;" class="dato-specifico">{{ $result->NomePromo }}</p>
      </a></li>
    @endforeach
  </ul>
  @endisset
  <br>
<br>
</div> 
@endsection