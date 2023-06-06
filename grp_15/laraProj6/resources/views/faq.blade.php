@extends('layouts.gestione')

@section('title','FAQ')

@section('content')
<script src="{{ asset('js/functions.js') }}"></script>
        <div class="ContenitoreFaqCompleto">
            <div class="ContenitoreLegenda">
                <h1>Argomenti</h1>
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
                @if (Gate::allows('isAdmin',auth()->user()))
                    <div>
                        <button class="Bottone_edit" style=" height: 42px; width:106px"id="btnmodFaq" onclick="apriPopUpMod('{{$faq->id}}','{{$faq->Argomento}}','{{$faq->Domanda}}','{{$faq->Risposta}}')">Modifica FAQ</button>
                        <a class="Bottone_elimina" style="text-decoration: none;" href="{{ route('eliminafaq', [$faq->id]) }}" >Elimina FAQ</a>

                    </div>
                    
                    
                @endif

            @endauth
                @endforeach
                
                    
            </div>
            @auth
                @if (Gate::allows('isAdmin',auth()->user()))
                    <button id="btnAggiungiFaq" class="Bottone_aggiungi"  onclick="apriPopUpFaq()">Aggiungi FAQ</button>
                @endif

            @endauth
            <div id="popupFaq" class="popupFaq" style="display: none;">
                <h2>Nuova FAQ</h2>
                <form id="formNuovaFaq" action="{{route('aggiungifaq')}}" method="POST" >
                    @csrf
                    <div>
                        <label for="inputArgomento">argomento:</label>
                    </div>
                    <div>
                        <input type="text" class="inputArgomento" name="inputArgomento"required>
                    </div>
                    <div>
                        <label for="inputDomanda">Domanda:</label>
                    </div>
                    <div>
                        <textarea  maxlength="254"style="resize: none;"  type="text" class="inputDomanda" name="inputDomanda"required></textarea>
                    </div>
                    <div>
                        <label for="inputRisposta">Risposta:</label>
                    </div>
                    <div>
                        <textarea maxlength="254"style="resize: none;"  class="inputRisposta" name="inputRisposta"required></textarea>
                    </div>
                    <div>
                        <button  class="Bottone_aggiungi"type="submit">Invia</button>
                        <button class="Bottone_edit"type="reset" onclick="annullaPopUp()">annulla</button>
                    </div>
                </form>
                    
            </div>

            <div id="popupFaqMod" class="popupFaq"  >
                <h2>Modifica FAQ</h2>
                <form id="formModificaFaq" action="{{route('modificafaq')}}">
                    
                    <div>
                        
                        <input type="text" class="inputid" id="name_id" name="name_id"required readonly  hidden>
                    </div>
                    
                    <div>
                        <label >Argomento:</label>
                    </div>
                    <div>
                        <input type="text" class="inputArgomento" id="argo" name="inputArgomentoM"required>
                    </div>
                    
                    <div>
                        <label for="inputDomanda"> Domanda:</label>
                    </div>
                    <div>
                        <textarea maxlength="254"style="resize: none;" type="text" class="inputDomanda"  value="prova"id="domanda" name="inputDomandaM"required></textarea>
                    </div>
                    <div>
                        <label for="inputRisposta">Risposta:</label>
                    </div>
                    <div>
                        <textarea maxlength="254"style="resize: none;" type="text" class="inputRisposta" id="risposta" name="inputRispostaM"required></textarea>
                    </div>
                    <div>
                        <button class="Bottone_aggiungi"type="submit" id="submitMod">InviaMod</button>
                        <button class="Bottone_edit"type="reset" onclick="annullaPopUpMod()">annulla</button>
                    </div>
        

        
                </form>
            </div>

            
        </div>
@endsection