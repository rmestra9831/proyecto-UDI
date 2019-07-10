<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UDI Sirc @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/0892879507.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="h-important">
    <div id="app">
        @if (Auth::check())
            @include('layouts.navbar')
        @else
        @endif
        <!--Aqui va todo el contenido de la app -->
        <!--Aqui va El menu de procesos -->
        <div class="h-100">
            <div class="container-fluid content">
                <div class="row h-100">
                    <!--Panel menu -->
                    <div class="col-2 menu-panel
                    <?php if (Auth::user()->type_user == 2) {
                        //variables para cambiar el color del pane según el usuario
                        ?>bg-p-regctrol<?php }
                        elseif (Auth::user()->type_user == 3) {
                            ?>bg-p-direction<?php
                        };?>
                    text-white h-100">
                        @include('components.main-panel')
                    </div>
                    <!--Panel contenido -->
                    <div class="col-10 container-fluid content-panel h-100">
                        @yield('content-panel')           
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>
