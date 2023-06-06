@extends('layouts.gestione')

@section('title', 'Assegna aziende all\' operatore')
@section('content')
    
<h1>ASSEGNA AZIENDE ALL'OPERATORE {{\App\Models\Utente::where('id',$oper)->value('NomeUtente')}}</h1>
    
<br>
    <br>
    {{ Form::open(['route' => ['assegnaaziende2','oper'=>$oper], 'method' => 'POST', 'id' => 'Form_assegna', 'class' => 'Form_assegna']) }} <!--passa al metodo aggOp del controller Utente3, id è per JS  -->
       
        @foreach(\App\Models\Azienda::all() as $azienda)    
        {{ Form::label('Nome_azienda'. $azienda->id, 'Azienda: '.$azienda->Nome) }}
        {{ Form::checkbox('Nome_azienda' . $azienda->id, true)}} <!-- il primo param è il nome per associare il label(come for in html), il seconod param è il placeholder -->
        @endforeach

        {{ Form::submit('Assegna aziende', ['class' => 'Bottone_salva_2']) }}
        {{Form::close()}}
        <!-- mancano i controlli degli errori $messaggi -->
@endsection