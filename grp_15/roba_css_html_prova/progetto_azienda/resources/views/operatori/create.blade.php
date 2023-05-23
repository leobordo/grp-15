@extends('layout')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('titolo','crea un operatore')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>
    <body>
        @section('contenuto')
        <div class="GestioneClienti">
               <br>
               <br>
                <div>
                    <form action="{{route('operatori.store')}}" method="POST"> 
                        @csrf
                        <label for="password">Password:</label> 
                        <input  id="password" name="password" value="{{old('password')}}" type="text"><br><br>
                        @error('password')
                        {{$message}}
                    @enderror

                        <label for="nome">Nome:</label>
                        <input type="nome" id="nome" value="{{old('nome')}}" name="nome"><br>
                         @error('nome')
                        {{$message}}
                    @enderror
                    
                        <label for="cognome">Cognome:</label>
                        <input type="text" id="cognome" value="{{old('cognome')}}" name="cognome"><br>
                        @error('cognome')
                        {{$message}}
                    @enderror

                        <label for="email">Email:</label><br>
                        <input type="text" id="email" value="{{old('email')}}" name="email"><br>
                        @error('email')
                        {{$message}}
                    @enderror

                        <label for="telefono">Telefono:</label><br>
                        <input type="text" id="telefono" value="{{old('telefono')}}" name="telefono"><br>
                        @error('telefono')
                        {{$message}}
                    @enderror

                        <label for="genere">Genere:</label><br>
                        <input type="text" id="genere" value="{{old('genere')}}" name="genere"><br>
                    @error('genere')
                        {{$message}}
                    @enderror

                        <input type="submit" value="Crea operatore">
                        </form>
            </div>
            
            <div class="Bottone_elimina">
                <a href="funzione che cancella l'operatore">Elimina operatore</a>
            </div>

            <div class="Bottone_edit">
                <a href="funzione che modifica l'operatore">Modifica operatore</a>
        </div>
                     <br>
                     <br>
        </div>
        @endsection
</body>
</html>