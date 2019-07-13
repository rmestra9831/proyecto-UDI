@extends('layouts.app')
@section('title','| Registro y Control')
@section('content-panel')
<!-- cabecera del contenido-->
  <div class="row title-content">
      <h2 class="text-center text-capitalize title">radicados</h2>
  </div>
  <!--cuerpo delcontenido -->
  <div class="row justify-content-md-center cont-panel">

      @include('common.success')
        @if(Session::has('alert-ok-radic'))
          {{ Session::get('alert-ok-radic') }}
        @endif
        <!--definiendo contador para radicados -->
        <?php $cont_dir = 0?>        
        @foreach ($radicados as $radicado)
      
        @if ($radicado->fech_send_dir == '')
        <div class="col-11 content-card">
          @include('components.cards')
        </div>
        <?php $cont_dir = $cont_dir + 1;?>
        @else
          @if ($radicado->fech_send_dir == $radicado->fech_send_dir)
          @if ($radicado->fech_recive_radic == '')
            <div class="col-11 content-card">
              @include('components.cards')        
            </div>
          @else
            <div class="col-11 content-card">
            @if ($radicado->fech_delivered != '')
            <img src="{{asset('img/check.svg')}}" alt="">
            @else
            <img src="{{asset('img/waiting.svg')}}" alt="">
            @endif
              @include('components.cards')
            </div>
          @endif
          @endif
        @endif
      
        @endforeach
  </div>
  <div class="row footer-home b-show-top">
    <div><p class="foo-title">estados</p></div>
    <div><i class="far fa-circle"></i></div>
    <div><p class="foo-txt">Creado</p></div>

    <div><i class="fas fa-circle status-send"></i></div>
    <div><p class="foo-txt">Enviado</p></div>

    <div><i class="fas fa-circle status-recive-dir"></i></div>
    <div><p class="foo-txt">Recivido en Dirección</p></div>

    <div><i class="fas fa-circle status-saw-dir"></i></div>
    <div><p class="foo-txt">Revisado</p></div>
    <!--reset contador-->
<!--
  <form method="POST" action="{{action('RegctrolController@restarFechRadic')}}">
    @csrf
    <button class="btn btn-primary" type="submit">reset contador</button>
  </form>
-->
  </div>

@endsection
