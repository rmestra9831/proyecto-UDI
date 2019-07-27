@extends('layouts.app')
@section('title','| Radicado')
@section('content-panel')
  @include('common.success')

<div class="container show-card">
  <div class="col-11 content-show-card">
	
	@include('components.showCard')

	<div class="col-12 text-center text-capitalize">
	  	<!--botones y formulario para guardar la fecha y la hora-->
	  	@if ($radicado->fech_send_dir == '')
	  		<div class="d-inline-flex">
				<form method="POST" action="{{action('RegctrolController@update', $radicado->slug)}}">
				@method('PUT')
				@csrf
				  	<input name="time_send_dir" type="hidden" value="{{date("h:i:s A")}}">
				  	<input name="fech_send_dir" type="hidden" value="{{date("y/m/d")}}">
				<button class="btn btn-outline-success" type="submit"><i class="far fa-share-square"></i> Enviar a Direccion</button>
				</form>
	  		</div>
	  	@else
	  		@if ($radicado->fech_send_dir == $radicado->fech_send_dir)
				@if ($radicado->fech_recive_radic != '')
				  	<button btn-norm class="btn btn-outline-secondary"disabled type="submit"><i class="far fa-check-circle"></i> Revisado</button>
				  	<a btn-norm name="" id="" class="btn btn-outline-primary" href=" {{route('reg-ctrol.sendmail',$radicado->slug)}}" role="button"><?php if($radicado->fech_notifi_end != ''){ ?><i class="far fa-check-circle"></i> Correo enviado<?php }else { ?><i class="far fa-envelope"></i> Enviar Correo<?php } ?></a>
				@else
				  	<button class="btn btn-outline-secondary text-capitalize"disabled type="submit"><i class="fas fa-check"></i> Enviado a Direccion</button>      
				@endif
	  		@endif
	  	@endif
	  		<a btn-norm name="" id="" class="btn btn-secondary"
			@if (Auth::user()->type_user == 2)
				href="{{route('reg-ctrol.index')}}"
	  		@else
				@if (Auth::user()->type_user == 3)
				  href="{{route('direction.index')}}"
				@endif
	  		@endif
	  	role="button">Volver</a>
	</div>
	
</div>
</div>
@endsection

