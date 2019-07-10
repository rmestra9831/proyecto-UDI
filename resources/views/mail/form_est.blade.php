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
    <div class="col" style="margin: 10px 25px; position: relative;"><strong style="color: red; text-transform: uppercase;">origen:<p class="card-text-var text-truncate" style="text-transform: capitalize;">{{$e_data->name}} {{$e_data->last_name}}</p></strong></div>
    <div class="col" style="margin: 10px 25px; position: relative;"><strong style="color: red; text-transform: uppercase;" class="card-text">motivo:<p class="card-text-var text-truncate" style="text-transform: capitalize;">{{$e_data->motivo->name}}</p></strong></div>
    
    <!-- cuerpo-->
    <div class="col" style="margin: 10px 25px; position: relative;">
      <strong class="card-text">
        <p class="card-text-var">
            Apreciado(a) estudiante,<br>
            Informo que ya salio la respuesta de solicitud Radicado N° <strong>{{$e_data->fechradic_id}}-{{$e_data->year}}</strong> <br>
            Por favor diríjase a la oficina de Admisiones y registro a reclamar su respectiva respuesta.<br>
            En horario de atención de Lunes a Viernes de 8:00a.m.  a  12:00m - 2:00 p.m. a 6:00 p.m. Sábado de 8:00a.m. a 12:00m.<br>
            {{$e_data->obs}}<br>
            
            Gracias
        </p>
      </strong>
    </div>
    </div>
</div>