<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        
        <title>@yield('title')</title><!--AJAX per ottenere il nome dalla parte server e aggiornare dinamicamente il titolo della pagina. -->
       
        
        <!-- Fonts -->
        
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class='no-font'>
       
        <nav class="navbar">
            @include('layouts/_navpublic')
        </nav>
        
        <div class="font-sans text-gray-900 antialiased">
            
            {{ $slot }}
        </div>
        <br>
        <br>
        <div class="footer">
            @include('layouts/_footer')
        </div>
    </body>
</html>
