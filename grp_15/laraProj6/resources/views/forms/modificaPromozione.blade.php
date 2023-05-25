@extends('layouts.gestione')

@section('title', 'Modifica Promozione')

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
    
    <h1>MODIFICA PROMOZIONE</h1>
    <br>
    <br>
    
    {{ Form::model($record, ['route' => ['salvamodifichePromo','chiave' =>$record->id] ,'method' => 'POST', 'id' => 'Form_modifica_promo', 'class' => 'Form_modifica']) }}
        @csrf    
    <!--passa al metodo modOp del controller Utente3, id è per JS  -->
        {{ Form::label('NomePromo', 'NomePromo') }}
        {{ Form::text('NomePromo',$record->NomePromo)}} <!-- il primo param è il nome per associare il label(come for in html), il seconod param è il placeholder -->
        
        {{ Form::label('Azienda','Azienda')}}
        {{ Form::text('Azienda',$record->azienda->Nome)}}
        
        {{ Form::label('DescrizioneSconto','DescrizioneSconto')}}
        {{ Form::text('DescrizioneSconto',$record->DescrizioneSconto)}}

        {{ Form::label('PercentualeSconto','PercentualeSconto')}}
        {{ Form::text('PercentualeSconto',$record->PercentualeSconto)}}
        
        {{ Form::label('Scadenza', 'Scadenza') }}
        {{ Form::date('Scadenza', \Carbon\Carbon::parse($record->Scadenza)->format('Y-m-d')) }}

        
        @if ($errors->any()) <!-- fare meglio??? ora visualizza tutti gli errori sotto -->
    <div class="errori">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        {{ Form::submit('Salva modifiche', ['class' => 'Bottone_salva']) }}

        {{Form::close()}}
        <!-- mancano i controlli degli errori $messaggi -->
@endsection