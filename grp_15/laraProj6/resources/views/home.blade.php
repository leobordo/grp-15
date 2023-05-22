<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <title> @yield('title','Home')</title>
    </head>
    <body>
            <nav class="navbar">
                @include('layouts/_navpublic')
            </nav>
        
            <div id="header"></div>

            <div class="search-bar">
                <div>
                    <input aria-label="search text" class="searchbar-input sc-ion-searchbar-md" inputmode="search" placeholder="Cerca su  my little coupony" type="search"
                        autocomplete="off" autocorrect="off" wtx-context="14F1BC83-4A5A-444C-A0A9-BB910524D3AE" >
                </div>
                
            </div>
            <div class="container">
                <div class="scrollBanner" id="mybanner">
                    
                
                    <img src="banner3.png" alt="img" id="img">
                    <img src="banner3.png" alt="img" id="img">
                    <img src="banner3.png" alt="img" id="img">
                    <img src="banner3.png" alt="img" id="img">
                </div>
            </div>
            
           <div class="containerCoupon">
                <div class="scrollCoupon">
                    
                    <img src="banner3.png" alt="img" id="img">
                    <img src="banner3.png" alt="img" id="img">
                    <img src="banner3.png" alt="img" id="img">
                    <img src="banner3.png" alt="img" id="img">
    
                </div>
           </div>
            <div class="footer">
                @include('layouts/_footer')
            </div>
        </div>
        