@extends('layouts.gestione')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('title','creare un azienda')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>
    <body>
        @section('content')
       
            <h1>AGGIUNGI AZIENDA</h1>
            
                <form action="{{route('aggiungiAzienda2')}}" method="POST" enctype="multipart/form-data" class="Form_modifica"> 
                    @csrf
                    <label for="nome">Nome:</label> 
                    <input  id="nome" name="nome" value="{{old('nome')}}" type="text">
                    @error('nome')
                        <p style="color:red">{{$message}}<p>
                    @enderror
                    <label for="tipologia">Tipologia:</label>
                    <select id="tipologia" value="{{old('tipologia')}}" name="tipologia">
                        <option value="srl">SRL</option>
                        <option value="spa">SPA</option>
                        <option value="srls">SRLS</option>
                        <option value="snc">SNC</option>
                        <option value="sas">SAS</option>
                        <option value="start_up">Start-Up</option>
                    </select>
                    @error('tipologia')
                    <p style="color:red">{{$message}}<p>
                    @enderror
                    <br>
                    <label for="localizzazione">Localizzazione:</label>
                    <input type="text" id="localizzazione" value="{{old('localizzazione')}}" name="localizzazione">
                    @error('localizzazione')
                    <p style="color:red">{{$message}}<p>
                    @enderror
                    <label for="ragioneSociale">Ragione Sociale:</label>
                    <input type="text" id="ragioneSociale" value="{{old('ragioneSociale')}}" name="ragioneSociale">
                    @error('ragioneSociale')
                    <p style="color:red">{{$message}}<p>
                    @enderror
                    <label for="descrizione">Descrizione:</label>
                    <textarea id="descrizione" value="{{old('descrizione')}}" name="descrizione"></textarea>
                    @if(session('errorDesc'))
                <p style="color: red">-{{session('errorDesc')}}</p>
                @endif
                    <div>
                    <label for="immagine" style="display: inline-block">Immagine: </label><input type="file" id="immagine" name="immagine" style="display: inline-block">
                    </div>
                    @error('immagine')
                    <p style="color:red">{{$message}}<p>
                    @enderror
                    <br>
                    <input type="submit" value="Salva azienda" class="Bottone_salva">
                </form>
                       
            <br>
            <br>
        @endsection
    </body>
</html>