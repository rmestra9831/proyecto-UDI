<div style="
  display: flex;
  position: relative;
">
  <!-- card-->
    <div
    style="
      border: 1px solid #c4c4c4;
      width: 80%;
      box-shadow: 2px 2px 5px #eaeaea;
      margin: auto;
    "
    >
    <!--logo-->
    <div
    style="
      background: #bfbfbf;
      padding: 10px 30px;
    ">
      <img src="{{asset('img/logo-udi-completo.svg')}}" alt=""
      style="
      width: %;
      "
      >
    </div>
    <!-- cabecera-->
    <div class="col" style="margin: 10px 25px; position: relative;"><strong style="color: red; text-transform: uppercase;">origen:<p class="card-text-var text-truncate" style="text-transform: capitalize;">{{$data->name}} {{$data->last_name}}</p></strong></div>
    <div class="col" style="margin: 10px 25px; position: relative;"><strong style="color: red; text-transform: uppercase;" class="card-text">motivo:<p class="card-text-var text-truncate" style="text-transform: capitalize;">{{$data->motivo->name}}</p></strong></div>
    
    <!-- cuerpo-->
    <div class="col" style="margin: 10px 25px; position: relative;">
      <strong class="card-text">
        <p class="card-text-var">
            Se ha solicitado un nuevo radicado <br><br>
            @if ($data->atention == 'urgente')
            <strong style="text-transform: uppercase">* este radicado debe ser resuelto lo mas pronto posible *</strong>
            @endif
            El tiempo de respuesta es de maximo 3 dìas a partir recibido este correo
        </p>
      </strong>
    </div>
    </div>
</div>

