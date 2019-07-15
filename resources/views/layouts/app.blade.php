<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo_udi.png') }}" />

    <title>UDI Sirc @yield('title')</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!--script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/0892879507.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker3.standalone.css') }}" rel="stylesheet">

    <!-- Datepicker Files -->
    
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
                    <div panel class="col-10 container-fluid content-panel h-100">
                        @yield('content-panel') 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
