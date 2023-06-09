@extends('layouts.gestione')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('title','creare un azienda')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>
    <body>
        @section('content')
       
        <div class="GestioneClienti">
            @include('layouts._backButton')
            <div>
             <h1>MODIFICA AZIENDA</h1>
            </div>
            <div>
                <form action="{{ route('modificaAzienda2',['aziende' => $azienda->id]) }}" method="POST" class="Form_modifica">
                    @csrf
                    @method('PUT')
                    <label for="nome">Nome:</label> 
                    <input  id="nome" name="nome" value="{{$azienda->Nome}}" type="text"><br>
                    @error('nome')
                    <p style="color:red">{{$message}}<p>
                    @enderror
                    <br>
                    <label for="tipologia">Tipologia:</label>
                    <select id="tipologia" name="tipologia">
                        <option value="srl" {{ $azienda->Tipologia === 'srl' ? 'selected' : '' }}>SRL</option>
                        <option value="spa" {{ $azienda->Tipologia === 'spa' ? 'selected' : '' }}>SPA</option>
                        <option value="srls" {{ $azienda->Tipologia === 'srls' ? 'selected' : '' }}>SRLS</option>
                        <option value="snc" {{ $azienda->Tipologia === 'snc' ? 'selected' : '' }}>SNC</option>
                        <option value="sas" {{ $azienda->Tipologia === 'sas' ? 'selected' : '' }}>SAS</option>
                        <option value="start_up" {{ $azienda->Tipologia === 'start_up' ? 'selected' : '' }}>Start-Up</option>
                    </select>
                    @error('tipologia')
                    <p style="color:red">{{$message}}<p>
                @enderror
                    <br>
                    <br>
                    <label for="localizzazione">Localizzazione:</label>
                    <input type="text" id="localizzazione" name="localizzazione" value="{{$azienda->Localizzazione}}"><br>

                    @error('localizzazione')
                    <p style="color:red">{{$message}}<p>
                @enderror
                <br>
                    <label for="ragioneSociale">Ragione Sociale:</label>
                    <input type="text" id="ragioneSociale" value="{{$azienda->RagioneSociale}}" name="ragioneSociale"><br>
                    @error('ragioneSociale')
                    <p style="color:red">{{$message}}<p>
                @enderror
                <br>
                <label for="descrizione">Descrizione:</label>
                <textarea id="descrizione" name="descrizione">{{$azienda->Descrizione}}</textarea><br>
                
                @if(session('errorDesc'))
                <p style="color: red">-{{session('errorDesc')}}</p>
                @endif
                <br>
                <input type="submit" value="Salva" class="Bottone_salva">
                    </form>
            </div>
                     <br>
                     <br>
        </div>
        @endsection
</body>
</html>