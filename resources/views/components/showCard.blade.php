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
              <div class="col"><strong class="card-text">Programa:<p class="card-text-var">{{$radicado->program->name}}</p></strong></div>
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
                  sin respuesta
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
            <textarea id="my-textarea" style="overflow:hidden; resize:none" class="form-control" name="" rows="2"<?php if(Auth::user()->type_user == 3){?>placeholder="Escribe aquí tu respuesta" <?php }else if($radicado->delegate_id != Auth::user()->program_id || Auth::user()->type_user == 2){ ?>disabled placeholder="N/a"<?php } ?>><?php if($radicado->fech_recive_radic != ''){ ?>{{$radicado->respuesta}}<?php }?></textarea>
            <!--mostrando cuando se edito la respuesta-->
            @if ($radicado->fech_recive_radic != null)
              @if ($radicado->editAdmRequest != null)
                <small id="emailHelp" class="form-text text-muted">[Editado por el Administrador {{$radicado->editAdmRequest}} ]</small> 
              @endif
            @endif
          </div>
        </div>
        {{-- aqui muestra la hora en la que fue aprobado la respuesta --}}
        @if ($radicado->aproved != null)
          <h5 class="card-title text-center" style="margin:2% auto">Fecha de  aprobación: {{$radicado->fech_aprovado}} </h5>
        @endif
      @else
        @if (Auth::user()->type_user == 3)
          @if (Auth::user()->superAdmin == 1)
            <div class="col-6">
              <div class="form-group">
                <!-- guardar la respuesta al radicado-->
                  <form method="POST" action="{{action('AdminController@saveRequest', $radicado->slug)}}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="editAdmRequest" value="{{date('h:i:s A')}} | {{date('d_m_Y')}}">
                    <label class="card-text " for="my-textarea">Respuesta: <?php if($radicado->delegate_id != null){ 
                      ?>Delegada a
                      <?php }foreach ($programas as $programa) {
                        if ($programa->id == $radicado->delegate_id) { 
                          ?> {{$programa->name}} <?php
                        }
                      } ?></label>
                
                    <textarea id="responText" style="overflow:hidden; resize:none" value="" class="form-control col-12 @error('respuesta') is-invalid @enderror" name="respuesta" rows="2"
                      <?php if(Auth::user()->type_user == 3){?>
                        <?php if($radicado->respuesta == ''){?>disabled placeholder="N/a"<?php }else{ ?>placeholder="{{$radicado->respuesta}}"<?php }?>>{{$radicado->respuesta}}</textarea>
                      <?php }else{ ?><?php }?> 
                    @if ($radicado->editAdmRequest != null)
                      <small id="emailHelp" class="form-text text-muted">[Editado por el Administrador {{$radicado->editAdmRequest}} ]</small> 
                    @endif      
                    @error('respuesta')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </form>
              </div>
            </div> 
          @else
            {{-- sin permisos de super administrador  --}}
            <div class="col-6">
              <div class="form-group">
                <!-- guardar la respuesta al radicado-->
                  <form method="POST" action="{{action('DirectionController@saveRequest', $radicado->slug)}}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="respon_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="revisar" id="" value="0" hidden>
                    <label class="card-text" for="my-textarea">respuesta:</label>
                    <textarea  id="my-textarea" style="overflow:hidden; resize:none" class="form-control col-12 @error('respuesta') is-invalid @enderror" name="respuesta" rows="2"<?php if(Auth::user()->type_user == 3 && $radicado->delegate_id == Auth::user()->program_id){?>placeholder="Escribe aquí tu respuesta" <?php }else{ ?>disabled placeholder="N/a"<?php }?> <?php if($radicado->respuesta == '' || $radicado->revisar == true){?><?php }else{ ?>placeholder="{{$radicado->respuesta}}" disabled<?php }?>>{{$radicado->respuesta}}</textarea>
                      @if ($radicado->editAdmRequest != null)
                        <small id="emailHelp" class="form-text text-muted">[ Editado por el Administrador {{$radicado->editAdmRequest}} ]</small> 
                      @endif    
                      @if ($radicado->delegate_id == Auth::user()->program_id)
                        <button class="btn-revisado <?php if($radicado->respuesta == '' || $radicado->revisar == true){?><?php }else{ ?>d-none<?php }?>" type="submit"><i class="fas fa-check"></i></button>
                      @endif
                      @error('respuesta')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </form>
              </div>
            </div>             
          @endif

          @if (Auth::user()->superAdmin)
            <div class="row container">
              @if (!$radicado->delegate_id)
                <!-- boton para asignar respuesta-->
                <div class="col-12 justify-content-center">
                  <form method="POST" action="{{action('AdminController@asingDelegate', $radicado->slug)}}">
                    @method('PUT')
                    @csrf
                    <!-- Select para dirigir la respuesta -->
                    <div class="row justify-content-center">
                      <div class="col-3">
                        <select name="delegate_id" id="" class="form-control form-control-md @error('program_id') is-invalid @enderror">
                          <option class="text-capitalize" value="{{ old('program_id') }}">Asignar Respuesta</option>                      
                          @foreach ($programas as $programa)
                          <option class="" value="{{$programa->id}}">Dirección de {{$programa->name}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-2">
                        <button id="btnedit" name="" class="btn btn-outline-primary mr-2 ml-2" type="submit">Asignar</button>
                      </div>        
                    </div>
                  </form>
                </div>
              @else
                @if (!$radicado->respuesta)
                  <div class="card col-8 container">
                    <div class="card-body">
                      <h5 class="card-title text-center">Esperando respuesta</h5>
                    </div>
                  </div>
                @else
                  <div class="row container justify-content-center">
                    <!-- boton para editar la respuesta-->
                      <form method="POST" action="{{action('AdminController@saveRequest', $radicado->slug)}}">
                      @method('PUT')
                      @csrf
          
                      <input type="hidden" name="editAdmRequest" value="{{date('h:i:s A')}} | {{date('d_m_Y')}}">
                      <input type="text" name="respuesta" id="seteoTextArea" value="" hidden>
                      @if ($radicado->aproved != 1)
                        @if ($radicado->revisar == 1 || $radicado->aproved ==1)
                        @else  
                          <button id="btnedit" name="" class="btn btn-outline-primary mr-2 ml-2" type="submit" disabled>Editar</button>
                        @endif
                      @endif
                      </form>
                    <!-- boton para editar la respuesta-->
                      <form method="POST" action="{{action('EstadoController@revisar', $radicado->slug)}}">
                        @method('PUT')
                        @csrf
                        <input type="text" name="revisar" id="" value="1" hidden>
                        <button  class="btn btn-outline-danger mr-2 ml-2" type="submit" <?php if($radicado->revisar == 1 || $radicado->aproved == 1){ ?>disabled<?php }?>><?php if($radicado->revisar == 1){ ?>Revisando<?php }else{?> Revisar<?php }?></button>
                      </form>
                    <!-- boton para aprovar la respuesta-->
                      <form method="POST" action="{{action('EstadoController@aprovado', $radicado->slug)}}">
                        @method('PUT')
                        @csrf
                        <input type="text" name="aproved" id="" value="1" hidden>
                        <button class="btn btn-success mr-2 ml-2" type="submit" <?php if($radicado->revisar == 1 || $radicado->aproved == 1){ ?>disabled<?php }?>>Aprovado</button>
                      </form>
                    <!-- boton para Generar PDF de la respuestya-->
                  </div>
                  <form method="get" action="{{action('ReportController@imprimir', $radicado->slug)}}">
                    @csrf
                      @if ($radicado->aproved == 1)
                        <button class="btn btn-secondary mr-2 ml-2" type="submit">Generar PDF</button>
                      @endif
                  </form>                      
                @endif
              @endif
            </div>
          @endif

          {{-- valida se esta aprovada la respuesta --}}
            @if ($radicado->revisar!= true && !$radicado->aproved )
              <div class="col-12 align-content-center">
                <div class="container card col-8">
                  <div class="card-body">
                    <h5 class="card-title text-center">Esperando Respuesta</h5>
                  </div>
                </div>
              </div>
            @else
              {{-- dejar que el director de programa genere el PDF de la respuesta --}}
              <div class="col-12">
                  <div class="row justify-content-center">
                      <form method="get" action="{{action('ReportController@imprimir', $radicado->slug)}}">
                          @csrf
                            @if ($radicado->aproved == 1)
                              <div class="row">
                                    <h5 class="card-title text-center" style="margin:auto">Fecha de  aprobación: {{$radicado->fech_aprovado}} </h5>
                                    @if (Auth::user()->type_user == 4)
                                      <div class="col">
                                        <button class="btn btn-secondary mr-2 ml-2" type="submit">Generar PDF</button>
                                      </div>                                      
                                    @endif
                              </div>
                            @endif
                        </form>
                  </div>
              </div>
            @endif   

        @else
          @if (Auth::user()->type_user == 4)
            <div class="col-6">
              <div class="form-group">
                <!-- guardar la respuesta al radicado-->
                  <form method="POST" action="{{action('DirprogController@saveRequest', $radicado->slug)}}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="respon_id" value="{{auth()->user()->id}}">
                    <input type="hidden" name="revisar" id="" value="0" hidden>
                    <label class="card-text" for="my-textarea">respuesta:</label>
                    <textarea  id="my-textarea" style="overflow:hidden; resize:none" class="form-control col-12 @error('respuesta') is-invalid @enderror" name="respuesta" rows="2" <?php if(Auth::user()->type_user == 4){?>placeholder="Escribe aquí tu respuesta" <?php }else{ ?>disabled placeholder="N/a"<?php }?> <?php if($radicado->respuesta == '' || $radicado->revisar == true){?><?php }else{ ?>placeholder="{{$radicado->respuesta}}" disabled<?php }?>>{{$radicado->respuesta}}</textarea>
                      @if ($radicado->editAdmRequest != null)
                        <small id="emailHelp" class="form-text text-muted">[ Editado por el Administrador {{$radicado->editAdmRequest}} ]</small> 
                      @endif    
                    <button class="btn-revisado <?php if($radicado->respuesta == '' || $radicado->revisar == true){?><?php }else{ ?>d-none<?php }?>" type="submit"><i class="fas fa-check"></i></button>
                    @error('respuesta')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </form>
              </div>
            </div>
            @if (!$radicado->revisar)
              @if ($radicado->respuesta!= null && !$radicado->aproved)
                <div class="col-12 align-content-center">
                  <div class="container card col-8">
                    <div class="card-body">
                      <h5 class="card-title text-center">Esperando Aprobación</h5>
                    </div>
                  </div>
                </div>
              @else
                {{-- dejar que el director de programa genere el PDF de la respuesta --}}
                <div class="col-12">
                    <div class="row justify-content-center">
                        <form method="get" action="{{action('ReportController@imprimir', $radicado->slug)}}">
                            @csrf
                              @if ($radicado->aproved == 1)
                                <div class="row">
                                      <h5 class="card-title text-center" style="margin:auto">Fecha de  aprobación: {{$radicado->fech_aprovado}}</h5>
                                      <div class="col">
                                        <button class="btn btn-secondary mr-2 ml-2" type="submit">Generar PDF</button>
                                      </div>
                                </div>
                              @endif
                          </form>
                    </div>
                </div>
              @endif   
            @endif
          @else
          <!-- ESTO ES LO QUE VE EL ADMINISTRADOR -->
              <div class="col-6">
                <div class="form-group">
                  <!-- guardar la respuesta al radicado-->
                    <form method="POST" action="{{action('AdminController@saveRequest', $radicado->slug)}}">
                      @method('PUT')
                      @csrf
                      <input type="hidden" name="editAdmRequest" value="{{date('h:i:s A')}} | {{date('d_m_Y')}}">
                      <label class="card-text " for="my-textarea">Respuesta: <?php if($radicado->delegate_id != null){ 
                        ?>Delegada a
                        <?php }foreach ($programas as $programa) {
                          if ($programa->id == $radicado->delegate_id) { 
                            ?> {{$programa->name}} <?php
                          }
                        } ?></label>

                      <textarea id="responText" style="overflow:hidden; resize:none" value="" class="form-control col-12 @error('respuesta') is-invalid @enderror" name="respuesta" rows="2"
                        <?php if(Auth::user()->type_user == 1){?>
                          <?php if($radicado->respuesta == ''){?>disabled placeholder="N/a"<?php }else{ ?>placeholder="{{$radicado->respuesta}}"<?php }?>>{{$radicado->respuesta}}</textarea>
                        <?php }else{ ?><?php }?> 
                      @if ($radicado->editAdmRequest != null)
                        <small id="emailHelp" class="form-text text-muted">[Editado por el Administrador {{$radicado->editAdmRequest}} ]</small> 
                      @endif      
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
      @endif

    </div>
  </div>
  <!-- Botones del administrador para EDITAR - REVISAR - APROVADO -->
  @if (Auth::user()->type_user == 1)
    <div class="row justify-content-center">
      @if (!$radicado->delegate_id)
        <!-- boton para asignar respuesta-->
        <div class="col-12">
          <form method="POST" action="{{action('AdminController@asingDelegate', $radicado->slug)}}">
            @method('PUT')
            @csrf
            <!-- Select para dirigir la respuesta -->
            <div class="row justify-content-center">
              <div class="col-3">
                <select name="delegate_id" id="" class="form-control form-control-md @error('program_id') is-invalid @enderror">
                  <option class="text-capitalize" value="{{ old('program_id') }}">Asignar Respuesta</option>                      
                  @foreach ($programas as $programa)
                  <option class="" value="{{$programa->id}}">Dirección de {{$programa->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-2">
                <button id="btnedit" name="" class="btn btn-outline-primary mr-2 ml-2" type="submit">Asignar</button>
              </div>        
            </div>
          </form>
        </div>
      @else
        @if (!$radicado->respuesta)
          <div class="card col-8">
            <div class="card-body">
              <h5 class="card-title text-center">Esperando respuesta</h5>
            </div>
          </div>
        @else
        
        <!-- boton para editar la respuesta-->
          <form method="POST" action="{{action('AdminController@saveRequest', $radicado->slug)}}">
              @method('PUT')
              @csrf
  
              <input type="hidden" name="editAdmRequest" value="{{date('h:i:s A')}} | {{date('d_m_Y')}}">
              <input type="text" name="respuesta" id="seteoTextArea" value="" hidden>
              @if ($radicado->aproved != 1)
                @if ($radicado->revisar == 1 || $radicado->aproved ==1)
                @else  
                  <button id="btnedit" name="" class="btn btn-outline-primary mr-2 ml-2" type="submit" disabled>Editar</button>
                @endif
              @endif
          </form>
        <!-- boton para editar la respuesta-->
          <form method="POST" action="{{action('EstadoController@revisar', $radicado->slug)}}">
            @method('PUT')
            @csrf
            <input type="text" name="revisar" id="" value="1" hidden>
            <button  class="btn btn-outline-danger mr-2 ml-2" type="submit" <?php if($radicado->revisar == 1 || $radicado->aproved == 1){ ?>disabled<?php }?>><?php if($radicado->revisar == 1){ ?>Revisando<?php }else{?> Revisar<?php }?></button>
          </form>
        <!-- boton para aprovar la respuesta-->
          <form method="POST" action="{{action('EstadoController@aprovado', $radicado->slug)}}">
            @method('PUT')
            @csrf
            <input type="text" name="aproved" id="" value="1" hidden>
            <button class="btn btn-success mr-2 ml-2" type="submit" <?php if($radicado->revisar == 1 || $radicado->aproved == 1){ ?>disabled<?php }?>>Aprovado</button>
          </form>
        <!-- boton para Generar PDF de la respuestya-->
          <form method="get" action="{{action('ReportController@imprimir', $radicado->slug)}}">
            @csrf
              @if ($radicado->aproved == 1)
                <button class="btn btn-secondary mr-2 ml-2" type="submit">Generar PDF</button>
              @endif
          </form>                      
        @endif
      @endif
    </div>
    @if ($radicado->aproved != null)
      <h5 class="card-title text-center" style="margin:2% auto">Fecha de  aprobación: {{$radicado->fech_aprovado}} </h5>
    @endif
    <hr>
  @endif
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
  