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
                   
    </div>

<!-- piecera-->
@endsection