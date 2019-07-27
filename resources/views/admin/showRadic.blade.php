@extends('layouts.app')
@section('title','| Radicado #'.$radicado->fechradic_id.'-'.$radicado->year.'')
@section('content-panel')
  @include('common.success')

<div></div>

<div class="container show-card">
    <div class="col-11 content-show-card">
    
    	@include('components.showCard')

    	<div class="col-12 text-center text-capitalize">
    	  	<!--botones y formulario para guardar la fecha y la hora-->
    	  	<a btn-norm name="" id="" class="btn btn-secondary"
    			@if (Auth::user()->type_user == 2)
    				href="{{route('reg-ctrol.index')}}"
    	  		@else
    				@if (Auth::user()->type_user == 3)
    				  href="{{route('direction.index')}}"
                    @else
    				  href="{{route('filter.viewAllRadic')}}"
                    @endif
    	  		@endif
    	  	role="button">Volver</a>
        
    	</div>
    
    </div>
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
  </div>
@endsection

