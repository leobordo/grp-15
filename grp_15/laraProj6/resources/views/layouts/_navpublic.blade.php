<ul>   
    <li>
      <div class="homeButton">
        <img src="ImMaGiNe LoGo" alt="logo" width="100" >
      </div>
    </li>
  
    
    
    <li><a href="{{ route('home') }}" title="Home">Home</a></li>
    <li><a href="{{ route('who') }}" title="Conoscici meglio">Chi siamo</a></li>
    <li><a href="{{ route('faq') }}" title="FAQ sul sito">FAQ</a></li>
  
    @auth
      @if(Gate::allows('isCliente',auth()->user()) || Gate::allows('isOperatore',auth()->user()))
      <li><a href="{{ route('profilo',[auth()->user()->id]) }}" title="Gestisci il tuo profiloo">Gestione Profilo</a></li>
      @endif
      @if(Gate::allows('isCliente',auth()->user()))
      <li><a href="{{ route('iMieiCoupon',[auth()->user()->id]) }}" title="Visualizza i tuoi coupon">I miei coupon</a></li>
      @endif
      @if(Gate::allows('isOperatore',auth()->user()))
        <li><a href="{{ route('showPromozione') }}" title="Gestisci promozioni del sito">Gestione Promozioni</a></li>
      @endif
      @if(Gate::allows('isAdmin',auth()->user()))
        <li><a href="{{ route('showCliente') }}" title="Gestisci clienti sito">Gestione Clienti</a></li>
        <li><a href="{{ route('showOperatore') }}" title="Gestisci staff sito">Gestione Staff</a></li>
        <li><a href="{{ route('gestioneAziende') }}" title="Gestisci aziende del sito">Gestione Aziende</a></li>
        <li><a href="{{ route('showOperatore') }}" title="Statistiche sito">Statistiche</a></li>
      @endif
      
      <li><a href="" title="Esci dall'account" class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="display:flex; position: absolute; top: 0; right: 0; margin-top: 10px; margin-right:5px">Logout</a></li>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    @endauth 
  
    @guest
      <li><a href="{{ route('register') }}" title="Iscriviti se non lo hai fatto" style="display:flex; position: absolute; top: 0; right: 0; margin-top: 10px; margin-right:5px">Iscriviti</a></li>
      <li><a href="{{ route('login') }}" title="Accedi al tuo account" style="display:flex; position: absolute; top: 0; right: 90px; margin-top: 10px; margin-right:5px">Accedi</a></li>
    @endguest
  </ul>
  

  