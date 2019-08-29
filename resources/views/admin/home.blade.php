@extends('layouts.app')
@section('title','| Administracion')
@section('content-panel')
<!-- cabecera del contenido-->
    <div class="row title-content">
        <h2 class="text-center text-capitalize title">inicio</h2>
    </div>
<!--cuerpo delcontenido -->
    <div class="row justify-content-md-center cont-panel">

        @include('common.success')
        @if(Session::has('alert-ok-radic'))
          {{ Session::get('alert-ok-radic') }}
        @endif     
        
        <div class=" cont-panel-adm">
            <div class="container">
                    <a href=" {{route('filter.viewAllRadic')}} " class="col card desing-1">
                        <img src=" {{asset('img/radic-2.svg')}} " alt="">
                        <div class="h3">Radicados</div>
                        <div class="p">cantidad aqui</div>
                    </a>

                    <a href="{{route('admin.showUsers')}}" class="col card desing-1">
                        <img src=" {{asset('img/usuarios.svg')}} " alt="">
                        <div class="h3">Usuarios</div>
                        <div class="p">cantidad aqui</div>
                    </a>

                    <a href="{{route('admin.showDir')}}" class="col card desing-1">
                        <img src=" {{asset('img/directors.svg')}} " alt="">
                        <div class="h3">Directores</div>
                        <div class="p">cantidad aqui</div>
                    </a>

                    <a href="{{route('admin.showProg')}}" class="col card desing-1">
                        <img src=" {{asset('img/inge.svg')}} " alt="">
                        <div class="h3">Programas</div>
                        <div class="p">cantidad aqui</div>
                    </a>
                    
            </div>
        </div>

    </div>

<!-- piecera-->
@endsection