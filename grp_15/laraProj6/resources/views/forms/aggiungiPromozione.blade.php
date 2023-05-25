@extends('layouts.gestione')

@section('title', 'Aggiungi Promozione')

<!-- @@section('scripts')

@@parent
<script src="{ asset('js/functions.js') }}" ></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(function () {
    var actionUrl = " { route('newproduct.store') }}";
    var formId = 'addproduct';
    $(":input").on('blur', function (event) {
        var formElementId = $(this).attr('id');
        doElemValidation(formElementId, actionUrl, formId);
    });
    $("#addproduct").on('submit', function (event) {
        event.preventDefault();
        doFormValidation(actionUrl, formId);
    });
});
</script>

@@endsection
-->
@section('content')
    <h1>AGGIUNGI PROMOZIONE</h1>
    <br>
    <br>
    {{ Form::open(['route' => 'aggiungipromozione2', 'method' => 'POST', 'id' => 'Form_aggiungi_pr', 'class' => 'Form_modifica']) }} <!--passa al metodo aggOp del controller Utente3, id è per JS  -->
    @csrf
        {{ Form::label('NomePromo', 'NomePromo') }}
        {{ Form::text('NomePromo','')}} <!-- il primo param è il nome per associare il label(come for in html), il seconod param è il placeholder -->

        {{ Form::label('Azienda','Azienda')}}
        {{ Form::text('Azienda','')}}

        {{ Form::label('DescrizioneSconto','DescrizioneSconto')}}
        {{ Form::text('DescrizioneSconto','')}}

        {{ Form::label('PercentualeSconto','PercentualeSconto')}}
        {{ Form::text('PercentualeSconto','')}}
        
        {{ Form::label('Scadenza', 'Scadenza') }}
        {{ Form::date('Scadenza', \Carbon\Carbon::now()) }}
            
        
        

        @if ($errors->any()) <!-- fare meglio??? ora visualizza tutti gli errori sotto -->
    <div class="errori">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        {{ Form::submit('Salva Promzione', ['class' => 'Bottone_salva']) }}

        {{Form::close()}}
        <!-- mancano i controlli degli errori $messaggi -->
@endsection