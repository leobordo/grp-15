@extends('layout')
<!DOCTYPE html>
<html lang="it">
    <head title="Gestione Operatore">
        <title>Gestione Operatori</title>
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>


  <body>
        @section('contenuto')
        <div class="GestioneClienti">
            <form class="CercaUtenti-form">
                <input type="text" placeholder="Cerca azienda" class="CercaUtenti-input">
                <button type="submit" class="CercaUtenti-bottone">Cerca</button>
              </form>
            <h1>LISTA OPERATORI</h1>
           <div>
            @if (count($operatori) > 0)
    <ul> 
        @foreach ($operatori as $operatore)
            <li><a href="{{route('operatori.show',['operatori'=> $operatore['id']]) }}">{{$operatore['nome']}}</a></li>
        @endforeach
    </ul>
@else 
    <p>non ci sono operatori da mostrare</p>
@endif

<div class="Bottone_aggiungi">
    <a href='{{ route('operatori.create')}}'>Aggiungi operatore</a>
</div> 
<br>
<br>
@endsection
</div>
</body>

</html>