<div class="col-12 cabecera-radic
  <?php if($radicado->atention == 'urgente')
  {?>p-urgente<?php }else{?> p-normal<?php }?>">
  <strong>{{$radicado->fechradic_id}}-{{$radicado->year}}</strong>
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
          <div class="col"><strong class="card-text">Programa: <p class="card-text-var">Dirección de {{$radicado->program->name}}</p></strong></div>
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

      <div class="col-4 text-truncate">
        <div class="row">
          <div class="col"><strong class="card-text">asunto:<p class="card-text-var text-right">{{$radicado->asunto}}</p></strong></div>
        </div>
      </div>

        {{-- seleccionar el archivo pdf --}}
        <div class="col-4 text-truncate">
            <div class="row custom-file">
              @if (!$radicado->filePDF)
                @if (Auth::user()->type_user == 2)
                  <div class="col"><strong class="card-text">Archivo:<p class="card-text-var text-right"><i class="fas fa-exclamation-triangle text-warning"></i> Sin documento cargado</p></strong></div>
                @endif
              @else
                <div class="row text-center">
                  {{-- ver y descargar el archivo si ya existe --}}
                  <div class="col-12">
                    <div class="row justify-content-center">
                      <form class="col-9" method="GET" action="{{action('ReportController@DownloadArchivo', $radicado->slug)}}">
                        <button class="btn btn-outline-success" type="submit"><i class="fas fa-download"></i> Descargar</button>
                      </form>
                    </div>
                  </div> 
                </div>
              @endif
            </div>
          </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-4 text-truncate">
        <div class="row">
          <div class="col"><strong class="card-text">Correo:<p class="card-text-var text-left text-lowercase">{{$radicado->origen_correo}}</p></strong></div>
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
                    {{$user->name}} | {{$radicado->program->name}}
                    @endif
                @endforeach
              @endif
            </p></strong></div>
        </div>
      </div>

    </div>
  </div>

<div class="row justify-content-md-center">
  <div class="col-3">
    <!--boton para ver el radicado-->
    <a btn-card name="" id="" class="btn btn-block btn-outline-primary" 
    @if (Auth::user()->type_user == 2)
      href="{{action('RegctrolController@edit', $radicado->slug)}}"
    @else
      @if (Auth::user()->type_user == 3)
        href="{{action('DirectionController@edit', $radicado->slug)}}"     
      @else
        @if (Auth::user()->type_user == 4)
          href="{{action('DirprogController@showinfoRadic', $radicado->slug)}}"
        @else
          @if (Auth::user()->type_user == 5)
            href="{{action('SuperadmController@showradic', $radicado->slug)}}"
          @else
            href="{{action('AdminController@ShowRadic', $radicado->slug)}}"
          @endif
        @endif   
      @endif
    @endif
    role="button">Ver radicado</a>     
  </div>
<!--mostrar el boton de entregado a estudiante-->
  @if (Auth::user()->type_user == 2)
    <div class="col-3">
      @if ($radicado->fech_notifi_end != '' || $radicado->fech_recive_radic != null)
        <form method="post" action="{{action('RegctrolController@updateDelivered', $radicado->slug)}}">
          @method('PUT')
          @csrf
          <input  name="time_delivered" type="hidden" value="{{date("h:i:s A")}}">
          <input  name="fech_delivered" type="hidden" value="{{date("y/m/d")}}">
          @if ($radicado->fech_delivered != '')
            <button btn-card class="btn btn-block btn-secondary"disabled  type="submit">Entregado</button> 
          @else
            <button btn-card class="btn btn-block btn-secondary"type="submit">Entregar</button>
          @endif    
        </form>
      @else
        <button btn-card class="btn btn-block btn-outline-secondary"disabled type="submit">Entregar</button>       
      @endif
    </div>
  @endif
</div>