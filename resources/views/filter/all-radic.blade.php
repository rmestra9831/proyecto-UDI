@extends('layouts.app')
@section('title','| Busqueda de Radicados')
@section('content-panel')

<!-- cabecera del contenido-->
  <div p1 class="row title-content">
      <h2 class="text-center text-capitalize title">Filtrado Total</h2>
      <!--formulario para busqueda-->
    <div class="col-12">
      <div class="container">
          <div class="row">
              <div class="col-12">
                <form method="GET" class="" action="{{action('FilterController@viewAllRadic')}}">
                  <div class="row justify-content-md-center">
                    <div class="col form-group">
                      <input id="my-input" class="form-control form-control-sm" type="text" name="name" placeholder="Nombre">
                    </div>
            
                    <div class="col form-group">
                      <input id="my-input" class="form-control form-control-sm" type="text" name="last_name" placeholder="Apellidos">
                    </div>
                    
                    <!--datapicker-->
                    <div class="col-3 input-daterange input-group-sm input-group" id="datepicker" data-provide="datepicker">
                        <input type="text" class="form-control-sm form-control datepicker" name="start" placeholder="Desde" autocomplete="none" >
                        <input type="text" class="form-control-sm form-control datepicker" name="end" placeholder="Hasta" autocomplete="none" >
                    </div>
                   
                    <div class="col form-group">
                      <input id="my-input" class="form-control form-control-sm" type="text" name="fechradic_id" placeholder="Numero de radicado">
                    </div>
                    <!--selects-->
                    <!--motivos-->
                    <div class="col form-group">
                      <select name="motivo" id="motivo" class="text-capitalize form-control form-control-sm">
                          <option class="text-capitalize" value="">Motivo</option>                                          
                        @foreach ($motivos as $motivo)
                        <option class="text-capitalize" value="{{$motivo->id}}">{{$motivo->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <!--programas-->
                    <div class="col form-group">
                      <select name="programa" id="programa" class="text-capitalize form-control form-control-sm">
                          <option class="text-capitalize" value="">programa</option>                                          
                        @foreach ($programas as $programa)
                        <option class="" value="{{$programa->id}}">Dirección de {{$programa->name}}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>
                  <div class="col form-group">
                    <button class="btn btn-block btn-primary form-control-sm" type="submit">Buscar</button>
                  </div>
                </form>
              </div>
        
          </div>
      </div>
    </div>
  </div>
<!--cuerpo delcontenido -->
  <!-- validación de filtrado segun TIPO DE USUARIO -->
  @if (Auth::user()->type_user == 3)
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
  @else
  <!-- validación de filtrado según TIPO DE USUARIO -->
    @if (Auth::user()->type_user == 2)
      <div class="row justify-content-md-center cont-panel">
        @foreach ($radicados as $radicado)
          <div  class="col-11 content-card">
            @include('components.cards')
          </div>
        @endforeach
      </div>      
    @else
      <!-- validación de filtrado según TIPO DE USUARIO -->
      <div class="row justify-content-md-center cont-panel">
        @include('common.success')
          @if(Session::has('alert-ok-radic'))
            {{ Session::get('alert-ok-radic') }}
          @endif
          <!-- imprime todo lo que no se ha revisado -->
          @foreach ($radicados as $radicado)
            @if ($radicado->respuesta != null)
              <div  class="col-11 content-card">
                @include('components.cards')
              </div>
            @else
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
            @endif
          @endforeach
      </div>
    @endif
  @endif
<!-- piecera-->
<div class="row footer-home b-show-top">
    @if (Auth::user()->type_user == 1)
    <div><p class="foo-title">estados</p></div>
    <div><i class="far fa-circle"></i></div>
    <div><p class="foo-txt">Creado</p></div>
  
    <div><i class="fas fa-circle status-send"></i></div>
    <div><p class="foo-txt">Enviado</p></div>
  
    <div><i class="fas fa-circle status-recive-dir"></i></div>
    <div><p class="foo-txt">Recibido en Dirección</p></div>
  
    <div><i class="fas fa-circle status-saw-dir"></i></div>
    <div><p class="foo-txt">Revisado</p></div>
  @endif
    <div class="col-4">
    <strong class="contador text-uppercase">registros encontrados: {{count($radicados)}} </strong>
</div>
    <!--reset contador-->

<!--
  <form method="POST" action="{{action('RegctrolController@restarFechRadic')}}">
    @csrf
    <button class="btn btn-primary" type="submit">reset contador</button>
  </form>
-->
  </div>
@endsection
