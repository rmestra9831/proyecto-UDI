<div style="
  display: flex;
  position: relative;
">
  <!-- card-->
    <div
    style="
      border: 1px solid #c4c4c4;
      width: 60%;
      box-shadow: 2px 2px 5px #eaeaea;
      margin: auto;
      text-align: center;
      padding: 20px;
      box-shadow: 0 0 5px #80808070;
      border-radius: 15px;
    "
    >
    <!-- cabecera-->
    <div class="col" style="margin: 10px 25px; position: relative;"><p class="card-text-var" style="text-transform: capitalize;"><strong style="text-transform: capitalize;">origen:</strong>{{$data->name}} {{$data->last_name}}</p></div>
    <div class="col" style="margin: 10px 25px; position: relative;"><p class="card-text-var" style="text-transform: capitalize;"><strong style="text-transform: capitalize;" class="card-text">motivo: </strong>{{$data->motivo->name}}</p></div>
    
    <!-- cuerpo-->
    <div class="col" style="margin: 10px 25px; position: relative;">
      <strong class="card-text">
        <p class="card-text-var">
            Se ha solicitado un nuevo radicado <br><br>
            @if ($data->atention == 'urgente')
            <strong style="text-transform: uppercase">* Este radicado debe ser resuelto lo mas pronto posible *</strong>
            @endif
            El tiempo de respuesta es de maximo 3 dìas a partir recibido este correo
        </p>
      </strong>
    </div>
    </div>
</div>

