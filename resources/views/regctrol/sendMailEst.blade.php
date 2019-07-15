@extends('layouts.app')
@section('title','| Envio de Correo')
@section('content-panel')
<!-- cabecera del contenido-->
  <div class="row title-content">
      <h2 class="text-center text-capitalize title">Redacción del correo</h2>
  </div>
  <!--cuerpo delcontenido -->
  <div class="row justify-content-md-center cont-panel">
    <div class="container show-card">
      <div class="col-10 content-show-card">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col"><strong class="card-text">Dirigido a:<p class="card-text-var text-truncate">{{$radicado->origen_correo}}</p></strong></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col"><strong class="card-text">motivo:<p class="card-text-var text-truncate">{{$radicado->motivo->name}}</p></strong></div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col">
                    <strong class="card-text">
                      <p class="card-text-var">
                          Apreciado(a) estudiante {{$radicado->name}} {{$radicado->last_name}},<br><br>
                          Informo que ya salio la respuesta de solicitud Radicado N°{{$radicado->fechradic_id}}-{{$radicado->year}}<br>
                          Por favor diríjase a la oficina de Admisiones y registro a reclamar su respectiva respuesta.<br>
                          En horario de atención de Lunes a Viernes de 8:00a.m.  a  12:00m - 2:00 p.m. a 6:00 p.m. Sábado de 8:00a.m. a 12:00m.<br><br>
                          Gracias
                      </p>
                    </strong>
                </div>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col"><strong class="card-text">observaciones:</strong></div>
                </div>
                <div class="row">
                    @if ($radicado->fech_notifi_end != '')
                    <div class="col"><textarea id="my-textarea" class="form-control" name="obs" id="" aria-describedby="helpId" placeholder="" rows="1">{{$radicado->obs}}</textarea></div>                      
                  @endif
                </div>
                <hr>
                <!--botones y formulario para guardar la fecha y la hora-->
                @if ($radicado->fech_notifi_end == '')
                <form method="POST" action="{{action('RegctrolController@updateMailEst', $radicado->slug)}}">
                    @method('PUT')
                    @csrf
                    <input  name="time_notifi_end" type="hidden" value="{{date("h:i:s A")}}">
                    <input  name="fech_notifi_end" type="hidden" value="{{date("y/m/d")}}">
                    <div class="col"><textarea id="my-textarea" class="form-control" name="obs" id="" aria-describedby="helpId" placeholder="" <?php if($radicado->fech_notifi_end != ''){ ?>disabled<?php } ?> rows="1"></textarea></div>
                    <hr>
                    <div class="row">
                      <div class="col">
                        <div class="text-center">
                          <button btn-norm class="btn btn-outline-success" type="submit"><i class="far fa-share-square"></i> Enviar</button>
                        
                          @else
                          @if ($radicado->fech_notifi_end != '' )
                    <div class="row">
                      <div class="col">
                        <div class="text-center">
                          @else
                          @endif
                          @endif
                          <a btn-norm name="" id="" class="btn btn-secondary"
                          @if (Auth::user()->type_user == 2)
                            href="{{route('reg-ctrol.edit',$radicado->slug)}}"
                            @else
                              @if (Auth::user()->type_user == 3)
                                href=" reg-ctrol/{{$radicado->slug}}/edit"
                              @else
                                    
                             @endif
                          @endif
                          role="button">Volver</a>
                        </div>
                      </div>
                    </div>
              </form>
            
            </div>
          </div>
      </div>
    </div>  
  </div>
  <!--
  <div class="row footer-home">
    <div><p class="foo-title">Correo Para: </p></div>
    <div><p class="foo-txt">{{$radicado->origen_correo}}</p></div>

  </div>
-->
  
@endsection
