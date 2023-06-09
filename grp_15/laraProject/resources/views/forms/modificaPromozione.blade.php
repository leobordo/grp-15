@extends('layouts.gestione')

@section('title', 'Modifica Promozione')

@section('content')
@include('layouts._backButton')
    <h1>MODIFICA PROMOZIONE</h1>
    <br>
    <br>
    
    {{ Form::model($record, ['route' => ['salvamodifichePromo','chiave' =>$record->id] ,'method' => 'POST', 'id' => 'Form_modifica_promo', 'class' => 'Form_modifica']) }}
        @csrf    
    <!--passa al metodo modOp del controller Utente3, id è per JS  -->
        {{ Form::label('NomePromo', 'NomePromo') }}
        {{ Form::text('NomePromo',$record->NomePromo)}} <!-- il primo param è il nome per associare il label(come for in html), il seconod param è il placeholder -->
        
        {{ Form::label('Azienda','Azienda')}}
        {{ Form::select('Azienda', \App\Models\Azienda::pluck('Nome','id', (\App\Models\Azienda::where('id',$record->Azienda)->first())->Nome))}}
        
        {{ Form::label('DescrizioneSconto','DescrizioneSconto')}}
        {{ Form::textarea('DescrizioneSconto',$record->DescrizioneSconto)}}

        {{ Form::label('Tipologia','Tipologia')}}
        {{ Form::select('Tipologia',['Sconto'=>'Sconto','2X1'=>'2X1','3X1'=>'3X1','3X2'=>'3X2','4X2'=>'4X2','4X3'=>'4X3'], $record->Tipologia)}}

        {{ Form::label('PercentualeSconto','PercentualeSconto')}}
        {{ Form::text('PercentualeSconto',$record->PercentualeSconto)}}
        
        {{ Form::label('Scadenza', 'Scadenza') }}
        {{ Form::date('Scadenza', \Carbon\Carbon::parse($record->Scadenza)->format('Y-m-d')) }}

        <div class="errori">
        <br>
        <ul>
        @if(session('errorDesc'))
        <li style="color: red">-{{session('errorDesc')}}
        @endisset
        @if ($errors->any()) 
            @foreach ($errors->all() as $error)
                <li style="color:red">- {{ $error }}</li>
            @endforeach
        @endif
        </ul>
        </div>


        {{ Form::submit('Salva modifiche', ['class' => 'Bottone_salva_2']) }}
        {{Form::close()}}
        <!-- mancano i controlli degli errori $messaggi -->
@endsection