@extends('layouts.gestione')

@section('title', 'Aggiungi Operatore')

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
    <h1>AGGIUNGI OPERATORE</h1>
    <br>
    <br>
    {{ Form::open(array('route' => 'aggiungioperatore', 'id' => 'Form_aggiungi_op', 'class' => 'Form_modifica')) }} <!--passa al metodo aggOp del controller Utente3, id è per JS  -->
        {{ Form::label('Nome', 'Nome') }}
        {{ Form::text('Nome','')}} <!-- il primo param è il nome per associare il label(come for in html), il seconod param è il placeholder -->

        {{ Form::label('cognome','Cognome')}}
        {{ Form::text('cognome','')}}

        {{ Form::label('Email','Email')}}
        {{ Form::text('Email','')}}

        {{ Form::label('Telefono','Telefono')}}
        {{ Form::text('Telefono','')}}

        {{ Form::label('Genere', 'Genere') }}
        {{ Form::select('Genere',['Opzione1' => 'Maschio', 'Opzione2' => 'Femmina', 'Opzione3' => 'Altro'], '') }}

        {{ Form::label('NomeUtente','Nome utente')}}
        {{ Form::text('NomeUtente','')}}

        {{ Form::label('Password','Password')}}
        {{ Form::text('Password','')}}

        {{ Form::submit('Salva Operatore', ['class' => 'Bottone_salva']) }}

        {{Form::close()}}
        <!-- mancano i controlli degli errori $messaggi -->
@endsection
