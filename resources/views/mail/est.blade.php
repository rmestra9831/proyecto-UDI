<div class="row title-content">
    <h2 class="text-center text-capitalize title">Redacción del correo R#</h2>
</div>
<!--cuerpo delcontenido -->
<div class="row justify-content-md-center cont-panel">
  <div class="container show-card">
    <div class="col-5 content-show-card">
        <div class="row">
          <div class="col-12">
            <div class="row">
              <div class="col"><strong class="card-text">origen:<p class="card-text-var text-truncate">{{$radicado->name}} {{$radicado->last_name}}</p></strong></div>
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
        <div class="row">
            <div class="col-12">
              <div class="row">
                <div class="col">
                    <strong class="card-text">
                      <p class="card-text-var">
                          Le informamos que en atención a su comunicación recibida el día (x) con radicado N° <strong>{{$e_data->fechradic_id}}-{{$e_data->year}}</strong>, la respuesta la puede solicitar en la oficina de admisiones y registro.<br>
                          Los horarios de atención son:<br>
                          Lunes a viernes de 8:00am a 12:00m y 2:00pm a 6:15pm<br>
                          Sábados de 8:00am a 12:00m.<br>
                          En caso de no reclamo dentro de los 5 días siguientes de este llamado, entenderemos que acoge la(s) decisión(es) emitida y será archivada en su hoja de vida académica.<br>
                          
                          Cordial saludo,<br>
                          
                          Dirección Sede (nombre de la sede) <br>
                      </p>
                    </strong>
                </div>
              </div>
            </div>
          </div>
    </div>  
  </div>
</div>