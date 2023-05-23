@extends('layouts.gestione')

@section('title', 'Modifica Operatore')

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
    <h1>MODIFICA OPERATORE</h1>
    <br>
    <br>
    {{ Form::model($record, ['route' => ['salvamodifiche','chiave' =>$record->NomeUtente] ,'method' => 'POST', 'id' => 'Form_modifica_op', 'class' => 'Form_modifica']) }}
     <!--passa al metodo modOp del controller Utente3, id è per JS  -->
        {{ Form::label('Nome', 'Nome') }}
        {{ Form::text('Nome',$record->Nome)}} <!-- il primo param è il nome per associare il label(come for in html), il seconod param è il placeholder -->

        {{ Form::label('cognome','Cognome')}}
        {{ Form::text('cognome',$record->cognome)}}

        {{ Form::label('Email','Email')}}
        {{ Form::text('Email',$record->Email)}}

        {{ Form::label('Telefono','Telefono')}}
        {{ Form::text('Telefono',$record->Telefono)}}

        {{ Form::label('Genere', 'Genere') }}
        {{ Form::select('Genere',['Maschio' => 'Maschio', 'Femmina' => 'Femmina', 'Altro' => 'Altro'], $record->Genere) }}

        {{ Form::label('NomeUtente','Nome utente')}}
        {{ Form::text('NomeUtente',$record->NomeUtente)}}

        {{ Form::label('Password','Password')}}
        {{ Form::text('Password',$record->Password)}}

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