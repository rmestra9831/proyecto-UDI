@extends('layouts.app')
@section('title','| Direccion')
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
    
        
      @foreach ($radicados as $radicado)
        @if ($radicado->fech_send_dir == '')
  
        @else
          @if ($radicado->fech_recive_radic == '')
            @if ($radicado->fech_recive_dir == '')
            <div class="col-11 content-card">
                <!--ventada de recivido-->
                 <div class="unrecive" id="{{$radicado->id}}" valid="{{$radicado->id}}">
                   <!-- formulario para actualizar el estado de recivido direccion-->
                   <form action="{{route('status.update',$radicado->slug)}}" method="post">
                      @method('PUT')
                      @csrf
                        <input  name="time_recive_dir" type="hidden" value="{{date("h:i:s A")}}">
                        <input  name="fech_recive_dir" type="hidden" value="{{date("y/m/d")}}">
                     <button class="btn btn-primary text-capitalize" type="submit">recibir</button>
                   </form>
                 </div>
                 @include('components.cards')
               </div>
              @else
               <div class="col-11 content-card">
                  @include('components.cards')
                </div>
            @endif
              
          @else
          <div class="col-11 content-card">
            <img src="{{asset('img/check.svg')}}" alt="">
            @include('components.cards')
          </div>
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
  </div>
  

@endsection