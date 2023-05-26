<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>403 Accesso negato</title>
    <script>
        setTimeout(function() {
            window.location.href = '{{ $redirectUrl }}';
        }, 5000);//ritorna alla $redirectUrl dopo 5000ms=5sec
    </script>
</head>
<body style="text-align:center; color:red">
    <br>
    <br>
    <h1 >ERROR:403  ACCESSO NEGATO</h1>
    <br>
    <p>{{ $message }}</p>
    <img src="images\immagine_errore.jpg" height="200px" width="200px" style="position: fixed; top:60px; left:100px">
</body>
</html>
