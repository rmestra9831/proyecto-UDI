@extends('layouts.app')
@section('title','| Busqueda de Radicados')
@section('content-panel')
<!-- cabecera del contenido-->
  <div p1 class="row title-content">
      <h2 class="text-center text-capitalize title">Filtrado Total</h2>
      <!--formulario para busqueda-->
    <div class="col-8">
        <form method="GET" class="form-inline pull-right" action="{{action('RegctrolController@viewAllRadic')}}">
       
          <div class="form-group">
            <input id="my-input" class="form-control" type="text" name="name" placeholder="nombre" {{old('name')}}>
          </div>

          <div class="form-group">
            <input id="my-input" class="form-control" type="text" name="last_name" placeholder="apellidos" {{old('last_name')}}>
          </div>

          <div class="form-group">
            <input id="my-input" class="form-control" type="text" name="fechradic_id" placeholder="fechradic_id" {{old('fechradic_id')}}>
          </div>

          <div class="form-group">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </div>
 
        </form>
    </div>
  </div>
<!--cuerpo delcontenido -->
    <div class="row justify-content-md-center cont-panel">
      @foreach ($radicados as $radicado)
        <div  class="col-11 content-card">
          @include('components.cards')
        </div>
      @endforeach
    </div>
<!-- piecera-->
<div class="row footer-home b-show-top">
    <div><p class="foo-title">{{$radicados->render()}}</p></div>
    <!--reset contador-->
<!--
  <form method="POST" action="{{action('RegctrolController@restarFechRadic')}}">
    @csrf
    <button class="btn btn-primary" type="submit">reset contador</button>
  </form>
-->
  </div>
@endsection