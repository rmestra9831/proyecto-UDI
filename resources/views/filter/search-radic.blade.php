@extends('layouts.app')
@section('title','| Busqueda de Radicados')
@section('content-panel')
  <!-- cabecera del contenido-->
  <div p1 class="row title-content">
      <h2 class="text-center text-capitalize title">Filtrado</h2>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="col nav-item nav-link active" id="nav-normales-tab" data-toggle="tab" href="#nav-normales" role="tab" aria-controls="nav-contact" aria-selected="true">normales</a>
          <a class="col nav-item nav-link" id="nav-enviados-tab" data-toggle="tab" href="#nav-enviados" role="tab" aria-controls="nav-enviados" aria-selected="false">Enviados</a>
          <a class="col nav-item nav-link" id="nav-recivido-tab" data-toggle="tab" href="#nav-recivido" role="tab" aria-controls="nav-recivido" aria-selected="false">Recivido</a>
          <a class="col nav-item nav-link" id="nav-respondido-tab" data-toggle="tab" href="#nav-respondido" role="tab" aria-controls="nav-respondido" aria-selected="false">Respondido</a>
          <a class="col nav-item nav-link" id="nav-entregados-tab" data-toggle="tab" href="#nav-entregados" role="tab" aria-controls="nav-entregados" aria-selected="false">Entregados</a>
          <a class="col nav-item nav-link" id="nav-pendientes-tab" data-toggle="tab" href="#nav-pendientes" role="tab" aria-controls="nav-pendientes" aria-selected="false">Pendientes</a>
          <a class="col nav-item nav-link" id="nav-importantes-tab" data-toggle="tab" href="#nav-importantes" role="tab" aria-controls="nav-importantes" aria-selected="false">Importantes</a>
        </div>
      </nav>
  </div>
  <!--cuerpo delcontenido -->
  <div p2 class="row justify-content-md-center cont-panel">

    @include('common.success')
    @if(Session::has('alert-ok-radic'))
      {{ Session::get('alert-ok-radic') }}
    @endif
    
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-normales" role="tabpanel" aria-labelledby="nav-normales-tab">@include('filter.normal')</div>
        <div class="tab-pane fade" id="nav-enviados" role="tabpanel" aria-labelledby="nav-enviados-tab">@include('filter.enviado')</div>
        <div class="tab-pane fade" id="nav-recivido" role="tabpanel" aria-labelledby="nav-recivido-tab">@include('filter.revisado')</div>
        <div class="tab-pane fade" id="nav-respondido" role="tabpanel" aria-labelledby="nav-respondido-tab">@include('filter.response')</div>
        <div class="tab-pane fade" id="nav-entregados" role="tabpanel" aria-labelledby="nav-entregados-tab">@include('filter.entregado')</div>
        <div class="tab-pane fade" id="nav-pendientes" role="tabpanel" aria-labelledby="nav-pendientes-tab">@include('filter.pendiente')</div>
        <div class="tab-pane fade" id="nav-importantes" role="tabpanel" aria-labelledby="nav-importantes-tab">@include('filter.important')</div>
      </div>
       
  </div>
  <div class="row footer-home">
      <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </nav>
    <!--reset contador-->
<!--
  <form method="POST" action="{{action('RegctrolController@restarFechRadic')}}">
    @csrf
    <button class="btn btn-primary" type="submit">reset contador</button>
  </form>
-->
  </div>
@endsection
