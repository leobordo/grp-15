@extends('layout')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('titolo','operatore')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>
    <body>
        @section('contenuto')
        <div class="GestioneClienti">
               <br>
               <br>

              <div>
              {{$operatore['nome']}}
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