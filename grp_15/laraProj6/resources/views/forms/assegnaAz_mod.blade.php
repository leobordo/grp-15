@extends('layouts.gestione')

@section('title', 'Assegna aziende all\' operatore')
@section('content')

<h1>ASSEGNA AZIENDE ALL'OPERATORE {{\App\Models\Utente::where('id',$oper)->value('NomeUtente')}}</h1>

<br>
<br>
{{ Form::open(['route' => ['assegnaaziende2','oper'=>$oper], 'method' => 'POST', 'id' => 'Form_assegna', 'class' => 'Form_assegna']) }}
<div class="checkbox-grid"> <!-- Aggiungi un wrapper per la griglia di checkbox -->
    @foreach(\App\Models\Azienda::all() as $azienda)
    @if(\App\Models\Assegnazione::where('Operatore',$oper)->where('Azienda', $azienda->id)->exists())
    <div class="checkbox-item">
        {{ Form::label('Nome_azienda'. $azienda->id, 'Azienda: '.$azienda->Nome) }}
        {{ Form::checkbox('Nome_azienda' . $azienda->id, true,['checked' => true, 'class' => 'checkbox-input'])}}
    </div>
    @else
    <div class="checkbox-item">
        {{ Form::label('Nome_azienda'. $azienda->id, 'Azienda: ' . $azienda->Nome) }}
        {{ Form::checkbox('Nome_azienda' . $azienda->id,true, false, ['class' => 'checkbox-input'])}}
    </div>
    @endif
    @endforeach
</div>
{{ Form::submit('Assegna aziende', ['class' => 'Bottone_salva_2']) }}
{{Form::close()}}
<!-- mancano i controlli degli errori $messaggi -->
@endsection
