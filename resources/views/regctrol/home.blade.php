@extends('layouts.app')
@section('title','| Admisiones y Registro')
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
          @if (count($radicados))
            @foreach ($radicados as $radicado)
              @if ($radicado->fech_send_dir == '')
              <div class="col-11 content-card">
                @include('components.cards')
              </div>
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
          @else
              <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron radicados</h4></div>
          @endif
        

  </div>
  <div class="row footer-home b-show-top">
    <div><p class="foo-title">estados</p></div>
    <div><i class="far fa-circle"></i></div>
    <div><p class="foo-txt">Creado</p></div>

    <div><i class="fas fa-circle status-send"></i></div>
    <div><p class="foo-txt">Enviado</p></div>

    <div><i class="fas fa-circle status-recive-dir"></i></div>
    <div><p class="foo-txt">Recibido en Dirección</p></div>

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
