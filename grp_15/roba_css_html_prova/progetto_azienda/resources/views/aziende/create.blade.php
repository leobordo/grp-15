@extends('layout')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('titolo','creare un azienda')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>
    <body>
        @section('contenuto')
       
        <div class="GestioneClienti">
               <div>
             <h1>creare a nuova azienda</h1>
            </div>
            <div>
                <form action="{{route('aziende.store')}}" method="POST"> 
                    @csrf
                    <label for="nome">Nome:</label> 
                    <input  id="nome" name="nome" value="{{old('nome')}}" type="text"><br>
                    @error('nome')
                        {{$message}}
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
                    {{$message}}
                @enderror
                    <br>
                    
                    <label for="localizzazione">Localizzazione:</label>
                    <input type="text" id="localizzazione" value="{{old('localizzazione')}}" name="localizzazione"><br>
                    @error('localizzazione')
                    {{$message}}
                @enderror
                    <label for="ragioneSociale">Ragione Sociale:</label>
                    <input type="text" id="ragioneSociale" value="{{old('ragioneSociale')}}" name="ragioneSociale"><br>
                    @error('ragioneSociale')
                    {{$message}}
                @enderror
                    <label for="descrizione">Descrizione:</label>
                    <textarea id="descrizione" value="{{old('descrizione')}}" name="descrizione"></textarea><br>
                    @error('descrizione')
                    {{$message}}
                @enderror
                    <input type="submit" value="Crea Azienda">
                    </form>
            </div>
            
           

           
                     <br>
                     <br>
        </div>
        @endsection
</body>
</html>