<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('titolo')</title>
<style>

    
</style>
<link rel="stylesheet" href="{{ url('css/style.css')}}"> 
       
    <body>
        <div>

      <nav class="navbar">
      <ul>    
        <li><div class="homeButton"><img src="nikeLogo.png" alt="logo" width="100" ></div></li>
        <li><a href="#"></a></li>
        <li><a href="#">chi siamo</a></li>
        <li><a href="#">iscriviti</a></li>
        <li><a href="#">accedi</a></li>
        <li><a href="{{route('home.index') }}">Home</a></li>
        <li><a href="{{route('aziende.index')}}">Aziende</a></li>
        <li><a href="{{route('utenti.index')}}">Utenti</a></li>
        <li><a href="{{route('operatori.index')}}">Operatori</a></li>
      </ul>
  </nav>

        </div>
<br>
    @yield('contenuto')
        
    
        <footer class="footer">
            <p> contatti:</p>
            <p> numero di telefono: 2194212535</p>
        </footer>
    </body>
</html>
