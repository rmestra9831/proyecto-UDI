<!--cabecera del card-->
<div class="col-12 cabecera-radic
  <?php if($radicado->atention == 'urgente')
  {?>p-urgente<?php }else{?> p-normal<?php }?>">
  <strong>#{{$radicado->fechradic_id}}-{{$radicado->year}}</strong>
  @if ($radicado->atention == "urgente")
    <div class="txt-ur"><strong>Atención Urgente</strong></div>
  @endif
  <p>@include('components.stades')</p>
</div>
  <!--cuerpo del card-->
  <div class="col-12 body-card">
    <div class="row">
          <div class="col-3">
            <div class="row">
              <div class="col"><strong class="card-text">origen:<p class="card-text-var text-truncate">{{$radicado->name}} {{$radicado->last_name}}</p></strong></div>
            </div>
          </div>
    
          <div class="col-3 text-truncate text-right">
            <div class="row">
              <div class="col"><strong class="card-text">Programa: <p class="card-text-var">{{$radicado->program->name}}</p></strong></div>
            </div>
          </div>
    
          <div class="col-3 text-truncate">
            <div class="row">
              <div class="col"><strong class="card-text">destino:
                <p class="card-text-var">
                @foreach ($programas as $programa)
                  @if ($programa->id == $radicado->sendTo_id)
                  {{$programa->name}}
                  @endif
                @endforeach 
                </p></strong></div>
            </div>
          </div>

          <div class="col-3 text-truncate">
              <div class="row">
                <div class="col"><strong class="card-text">creado por:
                  <p class="card-text-var">
                    {{$radicado->user->name}}
                  </p></strong></div>
              </div>
            </div>
    </div>
    <hr>
    <div class="row">
          <!--prueba mostrar roles -->
          <div class="col-4 text-right">
            <div class="row">
              <div class="col"><strong class="card-text">motivo:<p class="card-text-var text-truncate">{{$radicado->motivo->name}}</p></strong></div>
            </div>
          </div>
    
          <div class="col-8 text-truncate">
            <div class="row">
              <div class="col"><strong class="card-text">asunto:<p class="card-text-var text-right">{{$radicado->asunto}}</p></strong></div>
            </div>
          </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-4 text-truncate">
        <div class="row">
          <div class="col"><strong class="card-text">Correo:<p class="card-text-var text-left">{{$radicado->origen_correo}}</p></strong></div>
        </div>
      </div>
      <div class="col-4 text-truncate text-right">
        <div class="row">
          <div class="col"><strong class="card-text">celular:<p class="card-text-var">{{$radicado->origen_cel}}</p></strong></div>
        </div>
      </div>
      <div class="col-4 text-truncate">
          <div class="row">
            <div class="col"><strong class="card-text">Respondido por:
              <p class="card-text-var">
                @if (!$radicado->respuesta)
                  sin responder
                @else
                  @foreach ($users as $user)
                      @if ($user->id == $radicado->respon_id)
                      {{$user->name}}
                      @endif
                  @endforeach
                @endif
              </p></strong></div>
          </div>
        </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label class="card-text" for="my-textarea">observaciones:</label>
          <textarea id="my-textarea" style="overflow:hidden; resize:none" class="form-control" disabled name="" rows="2">{{$radicado->observaciones}}</textarea>
        </div>
      </div>
      <!--mostrar el campo de respuesta -->
      @if (Auth::user()->type_user == 2)
        <div class="col-6">
          <div class="form-group">
            <label class="card-text" for="my-textarea">respuesta:</label>
            <textarea id="my-textarea" style="overflow:hidden; resize:none" class="form-control" name="" rows="2"<?php if(Auth::user()->type_user == 3){?>placeholder="Escribe aquí tu respuesta" <?php }else{ ?>disabled placeholder="N/a"<?php } ?>><?php if($radicado->fech_recive_radic != ''){ ?>{{$radicado->respuesta}}<?php }?></textarea>
            <!--mostrando cuando se edito la respuesta-->
            @if ($radicado->fech_recive_radic != null)
              @if ($radicado->editAdmRequest != null)
                <small id="emailHelp" class="form-text text-muted">[Editado por el Administrador {{$radicado->editAdmRequest}} ]</small> 
              @endif
            @endif
          </div>
        </div>
      @else
        @if (Auth::user()->type_user == 3)
          <div class="col-6">
            <div class="form-group">
              <!-- guardar la respuesta al radicado-->
                <form method="POST" action="{{action('DirectionController@saveRequest', $radicado->slug)}}">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="respon_id" value="{{auth()->user()->id}}">
                  <label class="card-text" for="my-textarea">respuesta:</label>
                  <textarea id="my-textarea" style="overflow:hidden; resize:none" class="form-control col-12 @error('respuesta') is-invalid @enderror" name="respuesta" rows="2"<?php if(Auth::user()->type_user == 3){?>placeholder="Escribe aquí tu respuesta" <?php }else{ ?>disabled placeholder="N/a"<?php }?> <?php if($radicado->respuesta == ''){?><?php }else{ ?>placeholder="{{$radicado->respuesta}}" disabled<?php }?>>{{$radicado->respuesta}}</textarea>
                    @if ($radicado->editAdmRequest != null)
                      <small id="emailHelp" class="form-text text-muted">[ Editado por el Administrador {{$radicado->editAdmRequest}} ]</small> 
                    @endif    
                  <button class="btn-revisado <?php if($radicado->respuesta == ''){?><?php }else{ ?>d-none<?php }?>" type="submit"><i class="fas fa-check"></i></button>
                  @error('respuesta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </form>
            </div>
          </div>
        @else
        <!-- ESTO ES LO QUE VE EL ADMINISTRADOR -->
          <div class="col-6">
            <div class="form-group">
              <!-- guardar la respuesta al radicado-->
                <form method="POST" action="{{action('AdminController@saveRequest', $radicado->slug)}}">
                  @method('PUT')
                  @csrf
                  <input type="hidden" name="editAdmRequest" value="{{date('h:i:s A')}} | {{date('d_m_Y')}}">
                  <label class="card-text" for="my-textarea">respuesta:</label>
                  <textarea id="my-textarea" style="overflow:hidden; resize:none" class="form-control col-12 @error('respuesta') is-invalid @enderror" name="respuesta" rows="2"
                    <?php if(Auth::user()->type_user == 1){?>
                      <?php if($radicado->respuesta == ''){?>disabled placeholder="N/a"<?php }else{ ?>placeholder="{{$radicado->respuesta}}"<?php }?>>{{$radicado->respuesta}}</textarea>
                    <?php }else{ ?><?php }?> 
                  @if ($radicado->editAdmRequest != null)
                    <small id="emailHelp" class="form-text text-muted">[Editado por el Administrador {{$radicado->editAdmRequest}} ]</small> 
                  @endif      
                    <button class="btn-revisado <?php if($radicado->respuesta == null){?>d-none<?php }?>" type="submit"><i class="fas fa-check"></i></button>
                  @error('respuesta')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </form>
            </div>
          </div>
        @endif
      @endif

    </div>
  </div>
  <!--tabla de fechas -->
  <table class="table table-sm">
    <thead class="thead-dark">
      <tr>
        <th scope="col"></th>
        <th class="text-uppercase" scope="col">creación</th>
        <th class="text-uppercase" scope="col">env dirección</th>
        <th class="text-uppercase" scope="col">rec dirección</th>
        <th class="text-uppercase" scope="col">rec admi-reg</th>
        <th class="text-uppercase" scope="col">entregado final</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="text-uppercase" scope="row">fecha</th>
        <td>{{$radicado->fech_start_radic}}</td>
        <td>{{$radicado->fech_send_dir}}</td>
        <td>{{$radicado->fech_recive_dir}}</td>
        <td>{{$radicado->fech_recive_radic}}</td>
        <td>{{$radicado->fech_delivered}}</td>
      </tr>
      <tr>
        <th class="text-uppercase" scope="row">hora</th>
        <td>{{$radicado->time_start_radic}}</td>
        <td>{{$radicado->time_send_dir}}</td>
        <td>{{$radicado->time_recive_dir}}</td>
        <td>{{$radicado->time_recive_radic}}</td>
        <td>{{$radicado->time_delivered}}</td>
      </tr>
    </tbody>
  </table>