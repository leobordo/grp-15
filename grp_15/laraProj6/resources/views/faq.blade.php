@extends('layouts.gestione')

@section('title','FAQ')

@section('content')
        <script>
            function mostraNascondiRisposta(id) {
                
                var risposta = document.getElementById(id);
                if (risposta.style.display === "none") {
                    risposta.style.display = "block";
                } else {
                    risposta.style.display = "none";
                }
            }
            function apriPopUp() {
            var popup = document.getElementById("popupFaq");
            popup.style.display = "block";
            }
            function annullaPopUp() {
            var popup = document.getElementById("popupFaq");
            popup.style.display = "none";
            }
            function creaFaq(){
                var domanda = document.getElementById("inputDomanda").value;
                var risposta = document.getElementById("inputRisposta").value;


                var popup = document.getElementById("popupFaq");
                popup.style.display = "none";
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

                @foreach ($faqs as $faq)
                <div onclick="mostraNascondiRisposta('{{$faq->id}}')">
                    <h2 id="domanda1" class="domanda">{{$faq->Domanda}}</h2>
                    <h3 id="{{$faq->id}}"class="risposta" style="display: none;"> {{$faq->Risposta}}</h3>
                </div>
                @auth
                @if (auth()->user()->Livello == 3)
                    <button id="btnAggiungiFaq" >modifica FAQ</button>
                    <button id="btnAggiungiFaq" >elimina FAQ</button>
                @endif

            @endauth
                @endforeach
                
                    
            </div>
            @auth
                @if (auth()->user()->Livello == 3)
                    <button id="btnAggiungiFaq" onclick="apriPopUp()">Aggiungi FAQ</button>
                @endif

            @endauth
            <div id="popupFaq" class="popup" style="display: none;">
                <h2>Nuova FAQ</h2>
                <form id="formNuovaFaq">
                    <div>
                        <label for="inputDomanda">Domanda:</label>
                    </div>
                    <div>
                        <input type="text" class="inputDomanda" required>
                    </div>
                    <div>
                        <label for="inputRisposta">Risposta:</label>
                    </div>
                    <div>
                        <textarea class="inputRisposta" required></textarea>
                    </div>
                    <div>
                        <button type="submit" onclick="creaFaq()">Invia</button>
                        <button type="submit" onclick="annullaPopUp()">annulla</button>
                    </div>
                  

                  
                </form>
              </div>
        </div>
@endsection