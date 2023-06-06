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
        {{ Form::select('Azienda', \App\Models\Azienda::whereIn('id', function ($query) {
            $query->select('Azienda')
                ->from('Assegnazione')
                ->where('Operatore', auth()->user()->id);
        })->pluck('Nome', 'id'),null, ['placeholder'=>'Seleziona un\' azienda'])}}

        {{ Form::label('DescrizioneSconto','DescrizioneSconto')}}
        {{ Form::textarea('DescrizioneSconto','')}}

        {{ Form::label('Tipologia','Tipologia')}}
        {{ Form::select('Tipologia',['Sconto'=>'Sconto','2X1'=>'2X1','3X1'=>'3X1','3X2'=>'3X2','4X2'=>'4X2','4X3'=>'4X3'], null, ['placeholder'=>'Seleziona una tipologia'])}}

        {{ Form::label('PercentualeSconto','PercentualeSconto')}}
        {{ Form::text('PercentualeSconto','')}}
        
        {{ Form::label('Scadenza', 'Scadenza') }}
        {{ Form::date('Scadenza', \Carbon\Carbon::now()) }}
            
        
        

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


        {{ Form::submit('Salva Promozione', ['class' => 'Bottone_salva_2']) }}

        {{Form::close()}}
        <!-- mancano i controlli degli errori $messaggi -->
@endsection