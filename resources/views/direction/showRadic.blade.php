@extends('layouts.app')
@section('title','| Radicado')
@section('content-panel')
  <div class="row title-content">
	</div>
<div class="container show-card">
  <div class="col-11 content-show-card">
    @include('common.success')      
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
              <button class="btn btn-primary" type="submit"
              <?php if($radicado->respuesta == '' || $radicado->aproved == false){ 
              ?>disabled<?php }?> <?php if($radicado->respuesta == ''){ ?>hidden<?php }?>><?php if($radicado->revisar == true){?> corregir <?php }else if($radicado->aproved == 0){?> Esperando aprovación<?php }else{ ?> Enviar a Registro y control <?php }?></button>         
          </form>
        </div>
        @else
        @if ($radicado->fech_recive_radic != '')
          <button class="btn btn-outline-secondary"disabled type="submit">Enviado a Registro y control</button>    
        @endif
        @endif
        <a name="" id="" class="btn btn-primary" href=" <?=$_SERVER["HTTP_REFERER"]?>" role="button">Volver</a>
        @endsection
      </div>
  </div>
</div> 