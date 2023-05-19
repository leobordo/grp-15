<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
        <title> @yield('title','Home')</title>
    </head>
    <body>
        <nav class="navbar">
            @include('layouts/_navpublic')
        </nav>
            @yield('content')
        <br>
        <br>
        <div class="footer">
            @include('layouts/_footer')
        </div>