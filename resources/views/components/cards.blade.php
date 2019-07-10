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
      <div class="col-4">
        <div class="row">
          <div class="col"><strong class="card-text">origen:<p class="card-text-var text-truncate">{{$radicado->name}} {{$radicado->last_name}}</p></strong></div>
        </div>
      </div>

      <div class="col-4 text-truncate text-right">
        <div class="row">
          <div class="col"><strong class="card-text">Programa: <p class="card-text-var">{{$radicado->program->name}}</p></strong></div>
        </div>
      </div>

      <div class="col-4 text-truncate">
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
    </div>
  </div>

<a name="" id="" class="btn btn-block btn-primary" 
@if (Auth::user()->type_user == 2)
  href="/reg-ctrol/{{$radicado->slug}}/edit"
@else
  @if (Auth::user()->type_user == 3)
    href="/direction/{{$radicado->slug}}/edit"     
  @endif
@endif
role="button">Ver radicado</a>
