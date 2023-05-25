<ul>   
    <li>
        <div class="homeButton">
            <img src="ImMaGiNe LoGo" alt="logo" width="100" >
        </div>
    </li>
  <li><a href="{{ route('home') }}" title="Home">Home</a></li>
  <li><a href="{{ route('who') }}" title="Conoscici meglio">Chi siamo</a></li>
  <li><a href="{{ route('faq') }}" title="FAQ sul sito">FAQ</a></li>
  @can('view-level3-navbar', Utente::class)
  <li><a href="{{ route('gestioneclienti') }}" title="Gestisci clienti sito">Gestione Clienti</a></li>
  <li><a href="{{ route('gestionestaff') }}" title="Gestisci staff sito">Gestione Staff</a></li>
  <li><a href="{{ route('gestioneaziende') }}" title="Gestisci aziende del sito">Gestione Aziende</a></li>
  <li><a href="{{ route('stats') }}" title="Statistiche sito">Statistiche</a></li>
  @endcan
  @auth
    @if(auth()->user()->Livello == 2)
        <li><a href="{{ route('showPromozione') }}" title="Gestisci promozioni del sito">Gestione Promozioni</a></li>
    @endif
    @if(auth()->user()->Livello == 3)
        <li><a href="{{ route('showOperatore') }}" title="Gestisci clienti sito">Gestione Clienti</a></li>
        <li><a href="{{ route('showCliente') }}" title="Gestisci staff sito">Gestione Staff</a></li>
        <li><a href="{{ route('gestioneAziende') }}" title="Gestisci aziende del sito">Gestione Aziende</a></li>
        <li><a href="{{ route('showOperatore') }}" title="Statistiche sito">Statistiche</a></li>
    @endif
    <li><a href="" title="Esci dall'account" class="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    @endauth 
  @guest
  <li><a href="{{ route('register') }}" title="Iscriviti se non lo hai fatto">Iscriviti</a></li>
  <li><a href="{{ route('login') }}" title="Accedi al tuo account">Accedi</a></li>
  @endguest
</ul>
