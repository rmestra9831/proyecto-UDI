@extends('layouts.app')
@section('title','| Busqueda de Radicados')
@section('content-panel')
  <!-- cabecera del contenido-->
  <div p1 class="row title-content">
      <h2 class="text-center text-capitalize title">Filtrado Por Estados</h2>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="col nav-item nav-link active" id="nav-normales-tab" data-toggle="tab" href="#nav-normales" role="tab" aria-controls="nav-contact" aria-selected="true">normales</a>
          <a class="col nav-item nav-link" id="nav-enviados-tab" data-toggle="tab" href="#nav-enviados" role="tab" aria-controls="nav-enviados" aria-selected="false">Enviados</a>
          <a class="col nav-item nav-link" id="nav-recivido-tab" data-toggle="tab" href="#nav-recivido" role="tab" aria-controls="nav-recivido" aria-selected="false">Recibido</a>
          <a class="col nav-item nav-link" id="nav-respondido-tab" data-toggle="tab" href="#nav-respondido" role="tab" aria-controls="nav-respondido" aria-selected="false">Respondido</a>
          <a class="col nav-item nav-link" id="nav-respondido-tab" data-toggle="tab" href="#nav-reciverg" role="tab" aria-controls="nav-reciverg" aria-selected="false">Recibido RG</a>
          <a class="col nav-item nav-link" id="nav-entregados-tab" data-toggle="tab" href="#nav-entregados" role="tab" aria-controls="nav-entregados" aria-selected="false">Entregados</a>
          <a class="col nav-item nav-link" id="nav-pendientes-tab" data-toggle="tab" href="#nav-pendientes" role="tab" aria-controls="nav-pendientes" aria-selected="false">Pendientes</a>
          <a class="col nav-item nav-link" id="nav-importantes-tab" data-toggle="tab" href="#nav-importantes" role="tab" aria-controls="nav-importantes" aria-selected="false">Importantes</a>
        </div>
      </nav>
  </div>
<!--cuerpo delcontenido -->
  <div class="row justify-content-md-center cont-panel">

    @include('common.success')
    @if(Session::has('alert-ok-radic'))
      {{ Session::get('alert-ok-radic') }}
    @endif
    
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-normales" role="tabpanel" aria-labelledby="nav-normales-tab">@include('filter.normal')</div>
        <div class="tab-pane fade" id="nav-enviados" role="tabpanel" aria-labelledby="nav-enviados-tab">@include('filter.enviado')</div>
        <div class="tab-pane fade" id="nav-recivido" role="tabpanel" aria-labelledby="nav-recivido-tab">@include('filter.recibido')</div>
        <div class="tab-pane fade" id="nav-respondido" role="tabpanel" aria-labelledby="nav-respondido-tab">@include('filter.response')</div>
        <div class="tab-pane fade" id="nav-reciverg" role="tabpanel" aria-labelledby="nav-reciverg-tab">@include('filter.recibidorg')</div>
        <div class="tab-pane fade" id="nav-entregados" role="tabpanel" aria-labelledby="nav-entregados-tab">@include('filter.entregado')</div>
        <div class="tab-pane fade" id="nav-pendientes" role="tabpanel" aria-labelledby="nav-pendientes-tab">@include('filter.pendiente')</div>
        <div class="tab-pane fade" id="nav-importantes" role="tabpanel" aria-labelledby="nav-importantes-tab">@include('filter.important')</div>
      </div>
  </div>
  <div class="row footer-home b-show-top">
      <div class="col-10">
        <form method="GET" class="" action="{{action('FilterController@viewSearchRadic')}}">
          <div class="row justify-content-md-center">
            <div class="col form-group">
              <input id="my-input" class="form-control form-control-sm" type="text" name="fechradic_id" placeholder="Numero de radicado">
            </div>

            <div class="col form-group">
              <input id="my-input" class="form-control form-control-sm" type="text" name="name" placeholder="Nombre">
            </div>
            
            <div class="col form-group">
              <input id="my-input" class="form-control form-control-sm" type="text" name="last_name" placeholder="Apellidos">
            </div>

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

            <div class="col form-group">
              <button class="btn btn-block btn-primary form-control-sm" type="submit">Buscar</button>
            </div>

          </div>
        </form>
        </div>
      <div class="col-2">
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
