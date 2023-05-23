@extends('layout')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('titolo','utente')
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>
    <body>
        @section('contenuto')
        <div class="GestioneClienti">
               <br>
               <br>

              <div>
              {{$utente['nome']}}
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