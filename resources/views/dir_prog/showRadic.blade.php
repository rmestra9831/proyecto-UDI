@extends('layouts.app')
@section('title','| Radicado')
@section('content-panel')

<div class="container show-card">
  @include('common.success')      
    <div class="col-11 content-show-card">
      @include('components.showCard')
  
      <div class="col-12 text-center text-capitalize">
        <!-- Aqui se imprime la información que contiene el radicado-->
        <a name="" id="" class="btn btn-primary" href="<?=$_SERVER["HTTP_REFERER"]?>" role="button">Volver</a>
        @endsection
      </div>
  </div>
</div> 