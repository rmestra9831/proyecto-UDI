@extends('layouts.app')
@section('title','| Radicado')
@section('content-panel')

<div class="container show-card">
  @include('common.success')      
    <div class="col-11 content-show-card">
      @include('components.showCard')
  
      <div class="col-12 text-center text-capitalize">
        <!-- Aqui se imprime la información que contiene el radicado-->
        @if ($radicado->fech_recive_radic == '')
        <div class="d-inline-flex">
          <form method="POST" action="{{route('direction.update',$radicado->slug)}}">
            @method('PUT')
            @csrf
              <input  name="time_recive_radic" type="hidden" value="{{date("h:i:s A")}}">
              <input  name="fech_recive_radic" type="hidden" value="{{date("y/m/d")}}">
              <!-- Si el estado no es enviado aparece este boton, cuando ya se ha enviado-->
              <!-- este cambia de estadp-->
          <button class="btn btn-primary" type="submit"<?php if($radicado->respuesta == ''){ ?>disabled<?php }else{ ?><?php }?>>Esperando Aprovación</button>
          </form>
        </div>
        @else
        @if ($radicado->fech_recive_radic != '')
          <button class="btn btn-outline-secondary"disabled type="submit">Enviado a Registro y control</button>    
        @endif
        @endif
        <a name="" id="" class="btn btn-primary" href=" {{route('direction.index')}} " role="button">Volver</a>
        @endsection
      </div>
  </div>
</div>