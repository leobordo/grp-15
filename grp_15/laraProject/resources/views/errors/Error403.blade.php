<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>403 Accesso negato</title>
    <script>
        setTimeout(function() {
            window.location.href = '{{ route('home') }}';
        }, 5000);//ritorna alla $redirectUrl dopo 5000ms=5sec
    </script>
</head>
<body style="text-align: center; color: red;">
    <br>
    <br>
    <h1>ERROR: 403 ACCESSO NEGATO</h1>
    <br>
    <div style="display: flex; align-items: center; justify-content: flex-start;">
        
        <img src={{ asset('images/immagine_errore.jpg')}} alt="immagine_di_errore" height="200px" width="200px" style="display: inline-block; margin-right: 100px; margin-left:50px">
        <div style="text-align: center; float: right; margin-left:100px">
            {{ $err }}
        </div>
    </div>
</body>


</html>
