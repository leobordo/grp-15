@extends('layouts.gestione')

@section('title', 'Aggiungi Operatore')
@section('content')
    
<h1>AGGIUNGI OPERATORE</h1>
    
<br>
    <br>
    {{ Form::open(['route' => 'aggiungioperatore2', 'method' => 'POST', 'id' => 'Form_aggiungi_op', 'class' => 'Form_modifica']) }} <!--passa al metodo aggOp del controller Utente3, id è per JS  -->
        {{ Form::label('Nome', 'Nome') }}
        {{ Form::text('Nome','')}} <!-- il primo param è il nome per associare il label(come for in html), il seconod param è il placeholder -->

        {{ Form::label('cognome','Cognome')}}
        {{ Form::text('cognome','')}}

        {{ Form::label('Email','Email')}}
        {{ Form::text('Email','')}}

        {{ Form::label('Telefono','Telefono')}}
        {{ Form::text('Telefono','')}}

        {{ Form::label('Genere', 'Genere') }}
        {{ Form::select('Genere',['Maschio' => 'Maschio', 'Femmina' => 'Femmina', 'Altro' => 'Altro'], '') }}       

        {{ Form::label('NomeUtente','Nome utente')}}
        {{ Form::text('NomeUtente','')}}

        {{ Form::label('Password','Password')}}
        {{ Form::text('Password','')}}

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

        {{ Form::submit('Salva Operatore', ['class' => 'Bottone_salva_2']) }}
        {{Form::close()}}
        <!-- mancano i controlli degli errori $messaggi -->
@endsection
