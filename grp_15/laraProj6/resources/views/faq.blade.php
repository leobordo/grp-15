@extends('layouts.gestione')

@section('title','FAQ')

@section('content')
        <script>
            function mostraNascondiRisposta(numero) {
                
                var risposta = document.getElementById("risposta"+numero);
                if (risposta.style.display === "none") {
                    risposta.style.display = "block";
                } else {
                    risposta.style.display = "none";
                }
            }
        </script>
<div class="ContenitoreFaqCompleto">
            <div class="ContenitoreLegenda">
                <h1>legenda</h1>
                <a href="#">argomento 1</a>
                <a href="#">argomento 2</a>
                <a href="#">argomento 3</a>
            </div>
            <div class="ContenitoreFaq">
                
                    <div onclick="mostraNascondiRisposta(1)">
                        <h2 id="domanda1" class="domanda">Domanda 1</h2>
                        <h3 id="risposta1" class="risposta" style="display: none;"> Risposta 1</h3>
                    </div>

                    <div onclick="mostraNascondiRisposta(2)">
                        <h2 id="domanda2" class="domanda" >Domanda 2</h2>
                        <h3 id="risposta2" class="risposta" style="display: none;">Risposta 2 ma se fosse una risposta molto più lunga della domanda come si vedrebbe? Si ma ancora molto più lunga a tal punto da vedere quando e come andrebbe a capo</h3>
                    </div>

                    <div onclick="mostraNascondiRisposta(3)">
                        <h2 id="domanda3" class="domanda">Domanda 3</h2>
                        <h3 id="risposta3" class="risposta" style="display: none;">Risposta 3</h3>
                    </div>

                    <div onclick="mostraNascondiRisposta(4)">
                        <h2 id="domanda4" class="domanda">Domanda 4</h2>
                        <h3 id="risposta4" class="risposta" style="display: none;">Risposta 4</h3>
                    </div>
                    
                    <div onclick="mostraNascondiRisposta(5)">
                        <h2 id="domanda5" class="domanda">Domanda 5</h2>
                        <h3 id="risposta5" class="risposta" style="display: none;">Risposta 5</h3>
                    </div>
                    
                    <div onclick="mostraNascondiRisposta(6)">
                        <h2 id="domanda6" class="domanda">Domanda 6</h2>
                        <h3 id="risposta6" class="risposta" style="display: none;">Risposta 6</h3>
                    </div>
                    
                    <div onclick="mostraNascondiRisposta(7)">
                        <h2 id="domanda7" class="domanda">Domanda 7</h2>
                        <h3 id="risposta7" class="risposta" style="display: none;">Risposta 7</h3>
                    </div>
                    
                    <div onclick="mostraNascondiRisposta(8)">
                        <h2 id="domanda8" class="domanda">Domanda 8</h2>
                        <h3 id="risposta8" class="risposta" style="display: none;">Risposta 8</h3>
                    </div>
                </div>
        </div>
@endsection