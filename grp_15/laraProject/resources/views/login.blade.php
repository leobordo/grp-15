@extends('layouts.public')

@section('title','Login')

@section('content')

<body>
    <script>
        function mostraIscrizione() {
            document.getElementById("Operatore").style.display = "none";
            document.getElementById("Operatore2").style.display ="block";
            }

        function mostraAccesso() {
            document.getElementById("Operatore").style.display = "block";
            document.getElementById("Operatore2").style.display = "none";
            }
        
    </script>
    
    
    <div class="Operatore" id="Operatore">
        <br>
        <h1>PROFILO</h1>
        <br>
        <br>
        <br>
        <div class="Form_modifica">
            <label for="username">Username:</label>
            <label for="username" >Username:</label>
            
            <label for="password">Password:</label>
            <label for="username">Username:</label>
            
            <label for="name">Nome:</label>
            <label for="username">Username:</label>
            
            <label for="surname">Cognome:</label>
            <label for="username">Username:</label>
            
            <label for="birthdate">Data di nascita:</label>
            <label for="username">Username:</label>
            
            <label for="email">Email:</label>
            <label for="username">Username:</label>
            
            <label for="phone">Telefono:</label>
            <label for="username">Username:</label>
            
            <label for="gender">Genere:</label>
            <label for="username">Username:</label>
            
            
          </div>

          <div>
            <button  onclick="mostraIscrizione()"  style="text-align: center;"class="Bottone_edit">modifica </button>
        </div>
    </div>
    <div class="Operatore2" id="Operatore2"style="display: none;">
        <br>
        <h1>PROFILO</h1>
        <br>
        <br>
        <br>
        <form class="Form_modifica">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="surname">Cognome:</label>
            <input type="text" id="surname" name="surname" required>
            
            <label for="birthdate">Data di nascita:</label>
            <input type="date" id="birthdate" name="birthdate" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Telefono:</label>
            <input type="tel" id="phone" name="phone" required>
            
            <label for="gender">Genere:</label>
            <select id="gender" name="gender" required>
              <option value="male">Maschio</option>
              <option value="female">Femmina</option>
              <option value="other">Altro</option>
            </select>
            
            <button type="submit" onclick="mostraAccesso()" class="Bottone_salva">Salva modifiche</button>
          </form>

@endsection