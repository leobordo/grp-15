@extends('layouts.gestione')
<!DOCTYPE html>
<html lang="it">
    <head>
        @section('title',$azienda['Nome'])
         <link rel="stylesheet" href="{{ url('css/style.css')}}"> 
    </head>
    <body>
        @section('content')
        <div class="GestioneClienti">
               <br>
               <br>

              <div class="Azienda">
                <table>
                    <tr><td>Nome</td><td>{{$azienda['Nome']}}</td></tr>
                    <tr><td>Tipologia</td><td>{{$azienda['Tipologia']}}</td></tr>
                    <tr><td>Localizzazione</td><td>{{$azienda['Localizzazione']}}</td></tr>
                    <tr><td>RagioneSociale</td><td>{{$azienda['RagioneSociale']}}</td></tr>
                    <tr><td>Descrizione</td><td>{{$azienda['Descrizione']}}</td></tr>
                </table>
        @endsection
</body>
</html>