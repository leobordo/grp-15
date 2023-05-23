@extends('layout')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('titolo','crea utente')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>
    <body>
        @section('contenuto')
        <div class="GestioneClienti">
               <br>
               <br>

              <div>
                <form action="{{route('utenti.store')}}" method="POST"> 
                    @csrf
                        <label for="password">password:</label> 
                        <input  id="password" name="password" value="{{old('password')}}" type="text"><br>
                        @error('password')
                        {{$message}}
                    @enderror

                        <label for="nome">nome:</label>
                        <input type="nome" id="nome" value="{{old('nome')}}" name="nome"><br>
                         @error('nome')
                        {{$message}}
                    @enderror
                    
                        <label for="cognome">cognome:</label>
                        <input type="text" id="cognome" value="{{old('cognome')}}" name="cognome"><br>
                        @error('cognome')
                        {{$message}}
                    @enderror

                        <label for="email">email:</label><br>
                        <input type="text" id="email" value="{{old('email')}}" name="email"><br>
                        @error('email')
                        {{$message}}
                    @enderror

                        <label for="telefono">telefono:</label><br>
                        <input type="text" id="telefono" value="{{old('telefono')}}" name="telefono"><br>
                        @error('telefono')
                        {{$message}}
                    @enderror

                        <label for="genere">genere:</label><br>
                        <input type="text" id="genere" value="{{old('genere')}}" name="genere"><br>
                    @error('genere')
                        {{$message}}
                    @enderror
                    
                    <input type="submit" value="Crea Utente">
                    </form>
            </div>
            
            <div class="Bottone_elimina">
                <a href="funzione che cancella l'azienda">Elimina utente</a>
            </div>
            <br>
            <br>
</div>
@endsection
</body>
</html>