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
          <form method="POST" action="/reg-ctrol/{{$radicado->slug}}">
            @method('PUT')
            @csrf
              <input  name="time_send_dir" type="hidden" value="{{date("h:i:s A")}}">
              <input  name="fech_send_dir" type="hidden" value="{{date("y/m/d")}}">
            <button class="btn btn-success" type="submit"><i class="far fa-share-square"></i> Enviar a Direccion</button>
          </form>
      </div>
      @else
      @if ($radicado->fech_send_dir == $radicado->fech_send_dir)
        @if ($radicado->fech_recive_radic != '')
          <button class="btn btn-outline-secondary"disabled type="submit"><i class="far fa-check-circle"></i> Revisado</button>
          <a name="" id="" class="btn btn-primary" href="/reg-ctrol/sendMail/{{$radicado->slug}}" role="button"><i class="far fa-envelope"></i> Enviar correo</a>
        @else
      <button class="btn btn-outline-secondary text-capitalize"disabled type="submit"><i class="fas fa-check"></i> Enviado a Direccion</button>      
        @endif
      @else
      @endif
      @endif
      <a name="" id="" class="btn btn-primary"
      @if (Auth::user()->type_user == 2)
        href="{{route('reg-ctrol.index')}}"
        @else
          @if (Auth::user()->type_user == 3)
            href="{{route('direction.index')}}"
          @else

         @endif
      @endif
      role="button">Volver</a>
      @endsection
    </div>

  </div>
</div>

