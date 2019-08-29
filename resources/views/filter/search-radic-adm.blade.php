@extends('layouts.app')
@section('title','| Busqueda de Radicados')
@section('content-panel')
  <!-- cabecera del contenido-->
  <div p1 class="row title-content">
      <h2 class="text-center text-capitalize title">Filtrado Por Estados</h2>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="col nav-item nav-link active" id="nav-pendiente-tab" data-toggle="tab" href="#nav-pendiente" role="tab" aria-controls="nav-pendiente" aria-selected="false">Pendiente</a>
          <a class="col nav-item nav-link" id="nav-editado-tab" data-toggle="tab" href="#nav-editado" role="tab" aria-controls="nav-editado" aria-selected="false">Editado</a>
          <a class="col nav-item nav-link" id="nav-corregir-tab" data-toggle="tab" href="#nav-corregir" role="tab" aria-controls="nav-corregir" aria-selected="false">Corregir</a>
          <a class="col nav-item nav-link" id="nav-aprovado-tab" data-toggle="tab" href="#nav-aprovado" role="tab" aria-controls="nav-aprovado" aria-selected="false">Aprovado</a>
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
        <div class="tab-pane fade show active" id="nav-pendiente" role="tabpanel" aria-labelledby="nav-pendiente-tab">@include('filter.pendiente-respon')</div>
        <div class="tab-pane fade" id="nav-editado" role="tabpanel" aria-labelledby="nav-editado-tab">@include('filter.editado')</div>
        <div class="tab-pane fade" id="nav-corregir" role="tabpanel" aria-labelledby="nav-corregir-tab">@include('filter.corregir')</div>
        <div class="tab-pane fade" id="nav-aprovado" role="tabpanel" aria-labelledby="nav-aprovado-tab">@include('filter.aprovado')</div>
      </div>
  </div>
  <div class="row footer-home b-show-top">
      <div class="col-10">
        <form method="GET" class="" action="{{action('FilterController@viewSearchRadicDir')}}">
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
<!-- paginacion-->
  
    <!--reset contador-->
<!--
  <form method="POST" action="{{action('RegctrolController@restarFechRadic')}}">
    @csrf
    <button class="btn btn-primary" type="submit">reset contador</button>
  </form>
-->
  </div>
@endsection
