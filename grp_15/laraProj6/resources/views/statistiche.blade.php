
@extends('layouts.gestione')

@section('title','statistiche')
@section('content')
    <div>
        <h2> NUMERO COUPON TOTALI: {{ \App\Models\Coupon::all()->count() }}</h2>
    </div>

    <script>
        function scrollToElementPromo() {
                    var element = document.getElementById("ricercaPromoStat").value;
                    var scrollbar=document.getElementById(element);
                    
                    alert(element);
                    if (element) {
                    scrollbar.scrollIntoView({ behavior: 'smooth' });
                    }
                }
                function scrollToElementCliente() {
                    var element = document.getElementById("ricercaClientiStat").value;
                    var scrollbar=document.getElementById(element);
                    
                    alert(element);
                    if (element) {
                    scrollbar.scrollIntoView({ behavior: 'smooth' });
                    }
                }



                function apriPopUp(id)
                {
                    var elemento = document.getElementById(id);
                    
                    if (elemento.style.display === "none") {
                    elemento.style.display = "inline-block";
                } else {
                    elemento.style.display = "none";
                }
            }
            function apriPopUpClienti(id)
                {
                    var elemento = document.getElementById("s"+id);
                    
                    if (elemento.style.display === "none") {
                    elemento.style.display = "inline-block";
                } else {
                    elemento.style.display = "none";
                }
            }

                
      </script>
    <div class="gruppoCercaStats">
        <div class="CercaUtenti-form" >
            <input type="text" id="ricercaPromoStat" placeholder="Cerca promozione"class="CercaUtenti-input">
            <button onclick="scrollToElementPromo()" class="CercaUtenti-bottone">Cerca</button>

          </div>

          <div class="CercaUtenti-form" >
            <input type="text" id="ricercaClientiStat" placeholder="Cerca cliente"class="CercaUtenti-input">
            <button onclick="scrollToElementCliente()" class="CercaUtenti-bottone">Cerca</button>

          </div>
            
           

    </div>
    
    <div class="gruppoStats">
            
            <div id="scrollPromo"class="scrollbar" >
                @isset($promozioni)
                <ul>
                    @foreach($promozioni as $promozione)
                            
                            <li id="{{ $promozione ->NomePromo }}" onclick="apriPopUp('{{ $promozione ->id }}')">
                                {{ $promozione ->NomePromo }}
                                <div id="{{ $promozione ->id }}" style="display: none" >
                                    Coupon emessi: {{ \App\Models\Coupon::where('Promozione',$promozione->id)->count() }} 
                                </div>
                            </li> 
                            
                            
                    @endforeach
                </ul>
                @endisset
            </div>
            
            
            <div id="scrollClienti"class="scrollbar">
                @isset($clienti)
                <ul>
                    @foreach($clienti as $cliente)
                            
                    <li id="{{ $cliente ->NomeUtente }}" onclick="apriPopUpClienti('{{ $cliente ->id }}')">
                        {{ $cliente ->NomeUtente }}
                        <div id="s{{ $cliente ->id }}" style="display: none" >
                            Coupon emessi: {{ \App\Models\Coupon::where('Utente',$cliente->id)->count() }} 
                        </div>
                    </li>
                            
                    @endforeach
                </ul>
                @endisset
            </div>
        </div>
@endsection