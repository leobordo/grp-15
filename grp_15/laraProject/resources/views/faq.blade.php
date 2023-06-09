@extends('layouts.gestione')

@section('title','FAQ')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/functions.js') }}"></script>
<script>
      setTimeout(function() {
          var errorDescLi = document.getElementById('errorDescLi');
          if (errorDescLi) {
              errorDescLi.style.display = 'none';
          }
      }, 3000);
  </script>

        <div class="ContenitoreFaqCompleto">
            <div class="ContenitoreFaq">

                @foreach ($faqs as $faq)
                <div onclick="mostraNascondiRisposta('{{$faq->id}}')">
                    <h2 id="domanda1" class="domanda">{{$faq->Domanda}}</h2>
                    <h3 id="{{$faq->id}}"class="risposta" style="display: none;"> {{$faq->Risposta}}</h3>
                </div>
                @auth
                @if (Gate::allows('isAdmin',auth()->user()))
                    <div>
                        <button class="Bottone_edit" style=" height: 42px; width:106px"id="btnmodFaq" onclick="apriPopUpMod('{{$faq->id}}','{{$faq->Domanda}}','{{$faq->Risposta}}')">Modifica FAQ</button>
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
                        <label for="inputDomanda">Domanda:</label>
                    </div>
                    <div>
                        <textarea  style="resize: none;"  type="text" class="inputDomanda" name="inputDomanda" id="inputDomanda" required></textarea>
                        
                    </div>
                    <div>
                        <label for="inputRisposta">Risposta:</label>
                    </div>
                    <div>
                        <textarea style="resize: none;"  class="inputRisposta" name="inputRisposta" required ></textarea>
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
                        <label for="inputDomanda"> Domanda:</label>
                    </div>
                    <div>
                        <textarea style="resize: none;" type="text" class="inputDomanda"  value="prova"id="domanda" name="inputDomandaM" required></textarea>
                    </div>
                    <div>
                        <label for="inputRisposta">Risposta:</label>
                    </div>
                    <div>
                        <textarea style="resize: none;" type="text" class="inputRisposta" id="risposta" name="inputRispostaM" required></textarea>
                    </div>
                    <div>
                        <button class="Bottone_aggiungi"type="submit" id="submitMod">InviaMod</button>
                        <button class="Bottone_edit"type="reset" onclick="annullaPopUpMod()">annulla</button>
                    </div>
        

        
                </form>
            </div>
        
        <div id="error-message" >
        @if(session('errorDesc'))
        <p class="errori" style="color:red">   {{ session('errorDesc') }}</p>
        <script>
        setTimeout(function() {
          var errorMessage = document.getElementById('error-message');
          if (errorMessage) {
              errorMessage.style.display = 'none';
          }
        }, 3000);
        </script>
        @endif
        @if ($errors->any()) 
        <div class="errori">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color:red">   {{ $error }}</li>
            @endforeach
        </ul>
        </div>
        @endif
        </div>
        </div>
@endsection