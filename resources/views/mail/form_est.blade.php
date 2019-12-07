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
    <!-- cabecera-->
    <div class="col" style="margin: 10px 25px; position: relative;"><strong style="color: red; text-transform: uppercase;">origen:<p class="card-text-var text-truncate" style="text-transform: capitalize;">{{$e_data->name}} {{$e_data->last_name}}</p></strong></div>
    <div class="col" style="margin: 10px 25px; position: relative;"><strong style="color: red; text-transform: uppercase;" class="card-text">motivo:<p class="card-text-var text-truncate" style="text-transform: capitalize;">{{$e_data->motivo->name}}</p></strong></div>
    
    <!-- cuerpo-->
    <div class="col" style="margin: 10px 25px; position: relative;">
      <strong class="card-text">
        <p class="card-text-var">
          Le informamos que en atención a su comunicación recibida el día ({{$e_data->fech_start_radic}}) con radicado N° <strong>{{$e_data->fechradic_id}}-{{$e_data->year}}</strong>, la respuesta la puede solicitar en la oficina de admisiones y registro.<br>
          Los horarios de atención son:<br><br>
          Lunes a viernes de 8:00am a 12:00m y 2:00pm a 6:15pm<br>
          Sábados de 8:00am a 12:00m.<br><br>
          En caso de no reclamo dentro de los 5 días siguientes de este llamado, entenderemos que acoge la(s) decisión(es) emitida y será archivada en su hoja de vida académica.<br>
          
          Cordial saludo,<br>
          
          Dirección Sede
          @foreach ($e_sedes as $sede)
              @if ($sede->id == $radicado->sede)
                ( {{$sede->name}} ) <br>
              @endif
          @endforeach  

        </p>
      </strong>
    </div>
    </div>
</div>