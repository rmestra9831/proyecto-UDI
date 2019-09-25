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
                          Le informamos que en atención a su comunicación recibida el día ({{$radicado->fech_start_radic}}) con radicado N° <strong>{{$radicado->fechradic_id}}-{{$radicado->year}}</strong>, la respuesta la puede solicitar en la oficina de admisiones y registro.<br>
                          Los horarios de atención son:<br><br>
                          Lunes a viernes de 8:00am a 12:00m y 2:00pm a 6:15pm<br>
                          Sábados de 8:00am a 12:00m.<br><br>
                          En caso de no reclamo dentro de los 5 días siguientes de este llamado, entenderemos que acoge la(s) decisión(es) emitida y será archivada en su hoja de vida académica.<br>
                          
                          Cordial saludo,<br>
                          
                          Dirección Sede
                          @foreach ($sedes as $sede)
                              @if ($sede->id == $radicado->sede)
                                ( {{$sede->name}} ) <br>
                              @endif
                          @endforeach  
                         
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
