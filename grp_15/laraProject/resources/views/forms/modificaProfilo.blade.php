@extends('layouts.gestione')

@section('title', 'Modifica Profilo')


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


        @if ($errors->any()) 
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