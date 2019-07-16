@extends('layouts.app')
@section('title','| Busqueda de Radicados')
@section('content-panel')

<!-- cabecera del contenido-->
  <div p1 class="row title-content">
      <h2 class="text-center text-capitalize title">Filtrado Total</h2>
      <!--formulario para busqueda-->
    <div class="col-12">
      <div class="container">
          <div class="row">
              <div class="col-12">
                <form method="GET" class="" action="{{action('RegctrolController@viewAllRadic')}}">
                  <div class="row justify-content-md-center">
                    <div class="col form-group">
                      <input id="my-input" class="form-control form-control-sm" type="text" name="name" placeholder="Nombre">
                    </div>
            
                    <div class="col form-group">
                      <input id="my-input" class="form-control form-control-sm" type="text" name="last_name" placeholder="Apellidos">
                    </div>
                    
                    <!--datapicker-->
                    <div class="col-3 input-daterange input-group-sm input-group" id="datepicker" data-provide="datepicker">
                        <input type="text" class="form-control-sm form-control datepicker" name="start" placeholder="Desde" autocomplete="none" />
                        <input type="text" class="form-control-sm form-control datepicker" name="end" placeholder="Hasta" autocomplete="none" />
                    </div>
                   
                    <div class="col form-group">
                      <input id="my-input" class="form-control form-control-sm" type="text" name="fechradic_id" placeholder="Numero de radicado">
                    </div>
                    <!--selects-->
                    <!--motivos-->
                    <div class="col form-group">
                      <select name="motivo" id="motivo" class="text-capitalize form-control form-control-sm">
                          <option class="text-capitalize" value="">Motivo</option>                                          
                        @foreach ($motivos as $motivo)
                        <option class="text-capitalize" value="{{$motivo->id}}">{{$motivo->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <!--programas-->
                    <div class="col form-group">
                      <select name="programa" id="programa" class="text-capitalize form-control form-control-sm">
                          <option class="text-capitalize" value="">programa</option>                                          
                        @foreach ($programas as $programa)
                        <option class="text-capitalize" value="{{$programa->id}}">{{$programa->name}}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>
                  <div class="col form-group">
                    <button class="btn btn-block btn-primary form-control-sm" type="submit">Buscar</button>
                  </div>
                </form>
              </div>
        
          </div>
      </div>
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
    <div class="col-8">
      <p class="foo-title">{{$radicados->render()}}</p>
    </div>
    <div class="col-4">
    <strong class="contador text-uppercase">registros encontrados: {{count($radicados)}} </strong>
</div>
    <!--reset contador-->

<!--
  <form method="POST" action="{{action('RegctrolController@restarFechRadic')}}">
    @csrf
    <button class="btn btn-primary" type="submit">reset contador</button>
  </form>
-->
  </div>
@endsection
