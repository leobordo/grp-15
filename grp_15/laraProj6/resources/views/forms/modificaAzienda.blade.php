@extends('layouts.aziende')
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
             <h1>modifica azienda</h1>
            </div>
            <div>
                <form action="{{ route('modificaAzienda2',['aziende' => $azienda->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="nome">Nome:</label> 
                    <input  id="nome" name="nome" value="{{$azienda->Nome}}" type="text"><br>
                    @error('nome')
                        {{$message}}
                    @enderror
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
                    {{$message}}
                @enderror
                    <br>
                    
                    <label for="localizzazione">Localizzazione:</label>
                    <input type="text" id="localizzazione" name="localizzazione" value="{{$azienda->Localizzazione}}"><br>

                    @error('localizzazione')
                    {{$message}}
                @enderror
                    <label for="ragioneSociale">Ragione Sociale:</label>
                    <input type="text" id="ragioneSociale" value="{{$azienda->RagioneSociale}}" name="ragioneSociale"><br>
                    @error('ragioneSociale')
                    {{$message}}
                @enderror
                <label for="descrizione">Descrizione:</label>
                <textarea id="descrizione" name="descrizione">{{$azienda->Descrizione}}</textarea><br>
                
                    @error('descrizione')
                    {{$message}}
                @enderror
                <input type="submit" value="Salva">
                    </form>
            </div>
            
           

           
                     <br>
                     <br>
        </div>
        @endsection
</body>
</html>