@extends('layouts.gestione')

@section('title', 'Modifica Profilo')

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
    <h1>MODIFICA PROFILO</h1>
    <br>
    <br>
    {{ Form::model($record, ['route' => ['salvaProfilo','chiave' =>$record->id] ,'method' => 'POST', 'id' => 'Form_modifica_pr', 'class' => 'Form_modifica']) }}
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


        @if ($errors->any()) <!-- fare meglio??? ora visualizza tutti gli errori sotto -->
        <br>
        <br>
        <div class="errori">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        {{ Form::submit('Salva modifiche', ['class' => 'Bottone_salva_2']) }}
        {{Form::close()}}
        
        <form action={{route('password.reset')}} method="GET">
            <input type="submit" value="Vuoi cambiare password?">
        </form>
        
        <!-- mancano i controlli degli errori $messaggi  -->
@endsection