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
                          Apreciado(a) estudiante,<br>
                          Informo que ya salio la respuesta de solicitud Radicado N°{{$radicado->fechradic_id}}-{{$radicado->year}}<br>
                          Por favor diríjase a la oficina de Admisiones y registro a reclamar su respectiva respuesta.<br>
                          En horario de atención de Lunes a Viernes de 8:00a.m.  a  12:00m - 2:00 p.m. a 6:00 p.m. Sábado de 8:00a.m. a 12:00m.<br>
                          Gracias
                      </p>
                    </strong>
                </div>
              </div>
            </div>
          </div>
    </div>  
  </div>
</div>