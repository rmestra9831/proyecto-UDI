@extends('layouts.app')
@section('title','| Exportaciones')
@section('content-panel')

<!-- cabecera del contenido-->
    <div class="row title-content">
        <h2 class="text-center text-capitalize title">generar reportes</h2>
    </div>
<!--
    FILTRADO POR MOTIVO
    <div class="row footer-home">
        <div class="col-2">
            <div class="col form-group">
                <p class="text-capitalize">generar por motivo</p>
            </div>
        </div>
        <div class="col-8">

            <form method="GET" class="" action="">
                <div class="row justify-content-md-center">

                    <div class="col form-group">
                      <select name="motivo" id="motivo" class="text-capitalize form-control form-control-sm">
                          <option class="text-capitalize" value="">Motivo</option>                                          
                        @foreach ($motivos as $motivo)
                        <option class="text-capitalize" value="</option>
                        @endforeach
                      </select>
                    </div>
                
                    <div class="col-3 form-group">
                      <button class="btn btn-block btn-outline-success form-control-sm" type="submit" onclick=this.form.action="{{action('ReportController@ExportMotivo')}}">Generar</button>
                    </div>
                    PREVISUALIZAR CANTIDAD DE RESULTADOS
                    <div class="col-3 form-group">
                        <button class="btn btn-block btn-secondary form-control-sm" type="submit" onclick=this.form.action="{{action('ReportController@index')}}">Mostrar Cantidad</button>
                    </div>
            
                </div>
            </form>
        </div>
        <div class="col-2">
          <strong class="contador text-uppercase">registros encontrados:  </strong>
        </div>
    </div>
     FILTRADO POR PROGRAMA
    <div class="row footer-home">
        <div class="col-2">
            <div class="col form-group">
                <p class="text-capitalize">generar por Programa</p>
            </div>
        </div>
        <div class="col-8">

            <form method="GET" class="" action="">
                <div class="row justify-content-md-center">

                    <div class="col form-group">
                        <select name="programa" id="programa" class="text-capitalize form-control form-control-sm">
                            <option class="text-capitalize" value="">programa</option>                                          
                            @foreach ($programas as $programa)
                            <option class="text-capitalize" value="</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3 form-group">
                      <button class="btn btn-block btn-outline-success form-control-sm" type="submit" onclick=this.form.action="{{action('ReportController@ExportPrograma')}}">Generar</button>
                    </div>
                    PREVISUALIZAR CANTIDAD DE RESULTADOS
                    <div class="col-3 form-group">
                            <button class="btn btn-block btn-secondary form-control-sm" type="submit" onclick=this.form.action="{{action('ReportController@index')}}">Mostrar Cantidad</button>
                        </div>
                    </div>
            </form>
        </div>
        <div class="col-2">
          <strong class="contador text-uppercase">registros encontrados: </strong>
        </div>
    </div>
-->
    <!-- FILTRADO COMPLETO-->
    <div class="row footer-home">
        <div class="col-12">

            <form method="GET" class="" action="">
                <div class="row justify-content-md-center">

                    <div class="row">
                        <div class="col form-group">
                          <input id="my-input" class="form-control form-control-sm" type="text" name="name" placeholder="Nombre">
                        </div>
                
                        <div class="col form-group">
                          <input id="my-input" class="form-control form-control-sm" type="text" name="last_name" placeholder="Apellidos">
                        </div>
                        <!-- DATA PICKER-->
                        <div class="col form-group">
                            <div class="input-daterange input-group-sm input-group" id="datepicker" data-provide="datepicker">
                                <input type="text" class="form-control-sm form-control datepicker" name="start" placeholder="Desde" autocomplete="off" />
                                <input type="text" class="form-control-sm form-control datepicker" name="end" placeholder="Hasta" autocomplete="off" />
                            </div>
                        </div>
                    </div>
                
                    <!--selects-->
                    <div class="row" style="margin-top: 10px;">
                        <div class="col">
                            <!-- SELECT MOTIVO-->
                            <div class="col form-group">
                                <select name="motivo" id="motivo" class="text-capitalize form-control form-control-sm">
                                    <option class="text-capitalize" value="">Motivo</option>                                          
                                    @foreach ($motivos as $motivo)
                                    <option class="text-capitalize" value="{{$motivo->id}}">{{$motivo->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="col form-group">
                                <select name="programa" id="programa" class="text-capitalize form-control form-control-sm">
                                    <option class="text-capitalize" value="">programa</option>                                          
                                    @foreach ($programas as $programa)
                                    <option class="text-capitalize" value="{{$programa->id}}">{{$programa->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- BOTONES DE ENVIO DE FORMILARIO-->
                        <div class="col-2 form-group">
                            <button class="btn btn-block btn-outline-success form-control-sm" type="submit" onclick=this.form.action="{{action('ReportController@ExportFilter')}}">Generar</button>
                        </div>
                        <div class="col-2 form-group">
                            <!--PREVISUALIZAR CANTIDAD DE RESULTADOS-->
                            <button class="btn btn-block btn-secondary form-control-sm" type="submit" onclick=this.form.action="{{action('ReportController@index')}}">Mostrar Cantidad</button>                    
                        </div>
                    </div>

                </div>
            </form>
            <div class="row">
                    <!--MOSTRAR CUANTOS HAY-->
                    <div class="col-12 text-center">
                        @if (Auth::user()->type_user == 2)
                            <strong class="contador text-uppercase">registros encontrados: {{count($r_by_all)}} </strong>                       
                        @else
                            @if(Auth::user()->type_user == 3)
                                <strong class="contador text-uppercase">registros encontrados: {{count($r_by_all_dir)}} </strong>                       
                            @endif  
                        @endif
                    </div>
                </div>
        </div>
    </div>
<!--cuerpo delcontenido -->
    <div class="row justify-content-md-center cont-panel">

        @include('common.success')
        @if(Session::has('alert-ok-radic'))
          {{ Session::get('alert-ok-radic') }}
        @endif     
        <hr>

        <div class="export-list container-fluid">
            @if (Auth::user()->type_user == 2)
                <table class="table table-hover table-bordered table-sm">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">NUMERO DE RADICADO</th>
                        <th scope="col">NOMBRES</th>
                        <th scope="col">APELLIDOS</th>
                        <th scope="col">PROGRAMA</th>
                        <th scope="col">DIRIGIDO A</th>
                        <th scope="col">MOTIVO</th>
                        <th scope="col">ASUNTO</th>
                        <th scope="col">CORREO</th>
                        <th scope="col">CELULAR</th>
                        <th scope="col">RESPUESTA</th>
                        <th scope="col">CREADO POR</th>
                        <th scope="col">RESPONDIDO POR</th>
                        <th scope="col">FECHA DE CREACIÓN</th>
                        <th scope="col">FECHA ENVIADO A DIRECCIÓN</th>
                        <th scope="col">RECIBIDO DE DIRECCIÓN</th>
                        <th scope="col">ENTREGADO FINAL</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($r_by_all) > 0)
                        @foreach($r_by_all as $radicado)
    
                            @if ($radicado->fech_recive_radic != null  || $radicado->fech_notifi_end != null && $radicado->fech_notifi_end == null)
                                @if ($radicado->fech_delivered != null)
                                    <tr class="bg-success">
                                        <th class="text-truncate">{{ $radicado->fechradic_id}}-{{ $radicado->year}}</th>
                                        <td class="text-truncate">{{ $radicado->name}}</td>
                                        <td class="text-truncate">{{ $radicado->last_name}}</td>
                                        <td>{{ $radicado->program->name}}</td>
                                        <!--DIRIGIDO A-->
                                        @foreach ($programas as $programa)
                                          @if ($programa->id == $radicado->sendTo_id)
                                          <td>{{ $programa->name}}</td>
                                          @endif
                                        @endforeach 
                                        <td class="text-truncate">{{ $radicado->motivo->name}}</td>
                                        <td class="text-truncate">{{ $radicado->asunto}}</td>
                                        <td>{{ $radicado->origen_correo}}</td>
                                        <td class="text-truncate">{{ $radicado->origen_cel}}</td>
                                        <td class="text-truncate">{{ $radicado->respuesta}}</td>
                                        <td>{{ $radicado->user->name}}</td>
                                        <!--REVISADO POR-->
                                        @if (!$radicado->respuesta)
                                        <td> |</td>
                                        @else
                                            @foreach ($users as $user)
                                                @if ($user->id == $radicado->respon_id)
                                                    <td>{{ $user->name}}</td>
                                                @endif
                                            @endforeach
                                        @endif                      
                                        <td class="text-truncate">{{ $radicado->fech_start_radic}} | {{$radicado->time_start_radic}}</td>
                                        <td class="text-truncate">{{ $radicado->fech_send_dir}} | {{$radicado->time_send_dir}}</td>
                                        <td class="text-truncate">{{ $radicado->fech_recive_radic}} | {{$radicado->time_recive_radic}}</td>
                                        <td class="text-truncate">{{ $radicado->fech_delivered}} | {{$radicado->time_delivered}}</td>
                                    </tr>  
                                @else
                                    <tr class="bg-warning">
                                        <th class="text-truncate">{{ $radicado->fechradic_id}}-{{ $radicado->year}}</th>
                                        <td class="text-truncate">{{ $radicado->name}}</td>
                                        <td class="text-truncate">{{ $radicado->last_name}}</td>
                                        <td>{{ $radicado->program->name}}</td>
                                        <!--DIRIGIDO A-->
                                        @foreach ($programas as $programa)
                                          @if ($programa->id == $radicado->sendTo_id)
                                          <td>{{ $programa->name}}</td>
                                          @endif
                                        @endforeach 
                                        <td class="text-truncate">{{ $radicado->motivo->name}}</td>
                                        <td class="text-truncate">{{ $radicado->asunto}}</td>
                                        <td>{{ $radicado->origen_correo}}</td>
                                        <td class="text-truncate">{{ $radicado->origen_cel}}</td>
                                        <td class="text-truncate">{{ $radicado->respuesta}}</td>
                                        <td>{{ $radicado->user->name}}</td>
                                        <!--REVISADO POR-->
                                        @if (!$radicado->respuesta)
                                        <td> |</td>
                                        @else
                                            @foreach ($users as $user)
                                                @if ($user->id == $radicado->respon_id)
                                                    <td>{{ $user->name}}</td>
                                                @endif
                                            @endforeach
                                        @endif
                                        
                                        <td class="text-truncate">{{ $radicado->fech_start_radic}} | {{$radicado->time_start_radic}}</td>
                                        <td class="text-truncate">{{ $radicado->fech_send_dir}} | {{$radicado->time_send_dir}}</td>
                                        <td class="text-truncate">{{ $radicado->fech_recive_radic}} | {{$radicado->time_recive_radic}}</td>
                                        <td class="text-truncate">{{ $radicado->fech_delivered}} | {{$radicado->time_delivered}}</td>
                                    </tr>
                                @endif
                            @else
                                <tr class="bg-light">
                                        <th class="text-truncate">{{ $radicado->fechradic_id}}-{{ $radicado->year}}</th>
                                        <td class="text-truncate">{{ $radicado->name}}</td>
                                        <td class="text-truncate">{{ $radicado->last_name}}</td>
                                        <td>{{ $radicado->program->name}}</td>
                                        <!--DIRIGIDO A-->
                                        @foreach ($programas as $programa)
                                          @if ($programa->id == $radicado->sendTo_id)
                                          <td>{{ $programa->name}}</td>
                                          @endif
                                        @endforeach 
                                        <td class="text-truncate">{{ $radicado->motivo->name}}</td>
                                        <td class="text-truncate">{{ $radicado->asunto}}</td>
                                        <td>{{ $radicado->origen_correo}}</td>
                                        <td class="text-truncate">{{ $radicado->origen_cel}}</td>
                                        <td class="text-truncate">{{ $radicado->respuesta}}</td>
                                        <td>{{ $radicado->user->name}}</td>
                                        <!--REVISADO POR-->
                                        @if (!$radicado->respuesta)
                                        <td> |</td>
                                        @else
                                            @foreach ($users as $user)
                                                @if ($user->id == $radicado->respon_id)
                                                    <td>{{ $user->name}}</td>
                                                @endif
                                            @endforeach
                                        @endif
                                        
                                        <td class="text-truncate">{{ $radicado->fech_start_radic}} | {{$radicado->time_start_radic}}</td>
                                        <td class="text-truncate">{{ $radicado->fech_send_dir}} | {{$radicado->time_send_dir}}</td>
                                        <td class="text-truncate">{{ $radicado->fech_recive_radic}} | {{$radicado->time_recive_radic}}</td>
                                        <td class="text-truncate">{{ $radicado->fech_delivered}} | {{$radicado->time_delivered}}</td>
                                </tr>
                            @endif
                    
                        @endforeach
                    @else
                        <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontró la petición</h4></div>    
                    @endif
                    </tbody>
                </table>
            @else
                @if (Auth::user()->type_user == 3) <!-- DIRECCION-->
                    <table class="table table-hover table-bordered table-sm">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">NUMERO DE RADICADO</th>
                            <th scope="col">NOMBRES</th>
                            <th scope="col">APELLIDOS</th>
                            <th scope="col">PROGRAMA</th>
                            <th scope="col">DIRIGIDO A</th>
                            <th scope="col">MOTIVO</th>
                            <th scope="col">ASUNTO</th>
                            <th scope="col">CORREO</th>
                            <th scope="col">CELULAR</th>
                            <th scope="col">RESPUESTA</th>
                            <th scope="col">CREADO POR</th>
                            <th scope="col">RESPONDIDO POR</th>
                            <th scope="col">FECHA DE CREACIÓN</th>
                            <th scope="col">RECIBIDO DE DIRECCIÓN</th>
                            <th scope="col">ENTREGADO AR</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($r_by_all_dir as $radicado)
                            @if($radicado->fech_send_dir != null)    
                                @if ($radicado->fech_recive_dir != null)
                                    @if ($radicado->fech_recive_dir != null &&  $radicado->fech_recive_radic != null )
                                        <tr class="bg-success">
                                            <th class="text-truncate">{{ $radicado->fechradic_id}}-{{ $radicado->year}}</th>
                                            <td class="text-truncate">{{ $radicado->name}}</td>
                                            <td class="text-truncate">{{ $radicado->last_name}}</td>
                                            <td>{{ $radicado->program->name}}</td>
                                            <!--DIRIGIDO A-->
                                            @foreach ($programas as $programa)
                                              @if ($programa->id == $radicado->sendTo_id)
                                              <td>{{ $programa->name}}</td>
                                              @endif
                                            @endforeach 
                                            <td class="text-truncate">{{ $radicado->motivo->name}}</td>
                                            <td class="text-truncate">{{ $radicado->asunto}}</td>
                                            <td>{{ $radicado->origen_correo}}</td>
                                            <td class="text-truncate">{{ $radicado->origen_cel}}</td>
                                            <td class="text-truncate">{{ $radicado->respuesta}}</td>
                                            <td>{{ $radicado->user->name}}</td>
                                            <!--REVISADO POR-->
                                            @if (!$radicado->respuesta)
                                            <td> |</td>
                                            @else
                                                @foreach ($users as $user)
                                                    @if ($user->id == $radicado->respon_id)
                                                        <td>{{ $user->name}}</td>
                                                    @endif
                                                @endforeach
                                            @endif                      
                                            <td class="text-truncate">{{ $radicado->fech_start_radic}} | {{$radicado->time_start_radic}}</td>
                                            <td class="text-truncate">{{ $radicado->fech_recive_dir}} | {{$radicado->time_recive_dir}}</td>
                                            <td class="text-truncate">{{ $radicado->fech_recive_radic}} | {{$radicado->time_recive_radic}}</td>
                                        </tr>  
                                    @else
                                        <tr class="bg-light">
                                            <th class="text-truncate">{{ $radicado->fechradic_id}}-{{ $radicado->year}}</th>
                                            <td class="text-truncate">{{ $radicado->name}}</td>
                                            <td class="text-truncate">{{ $radicado->last_name}}</td>
                                            <td>{{ $radicado->program->name}}</td>
                                            <!--DIRIGIDO A-->
                                            @foreach ($programas as $programa)
                                              @if ($programa->id == $radicado->sendTo_id)
                                              <td>{{ $programa->name}}</td>
                                              @endif
                                            @endforeach 
                                            <td class="text-truncate">{{ $radicado->motivo->name}}</td>
                                            <td class="text-truncate">{{ $radicado->asunto}}</td>
                                            <td>{{ $radicado->origen_correo}}</td>
                                            <td class="text-truncate">{{ $radicado->origen_cel}}</td>
                                            <td class="text-truncate">{{ $radicado->respuesta}}</td>
                                            <td>{{ $radicado->user->name}}</td>
                                            <!--REVISADO POR-->
                                            @if (!$radicado->respuesta)
                                            <td> |</td>
                                            @else
                                                @foreach ($users as $user)
                                                    @if ($user->id == $radicado->respon_id)
                                                        <td>{{ $user->name}}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            
                                            <td class="text-truncate">{{ $radicado->fech_start_radic}} | {{$radicado->time_start_radic}}</td>
                                            <td class="text-truncate">{{ $radicado->fech_recive_dir}} | {{$radicado->time_recive_dir}}</td>
                                            <td class="text-truncate">{{ $radicado->fech_recive_radic}} | {{$radicado->time_recive_radic}}</td>
                                        </tr>
                                    @endif
                                @else
                                    <tr class="bg-warning ">
                                            <th class="text-truncate">{{ $radicado->fechradic_id}}-{{ $radicado->year}}</th>
                                            <td class="text-truncate">{{ $radicado->name}}</td>
                                            <td class="text-truncate">{{ $radicado->last_name}}</td>
                                            <td>{{ $radicado->program->name}}</td>
                                            <!--DIRIGIDO A-->
                                            @foreach ($programas as $programa)
                                              @if ($programa->id == $radicado->sendTo_id)
                                              <td>{{ $programa->name}}</td>
                                              @endif
                                            @endforeach 
                                            <td class="text-truncate">{{ $radicado->motivo->name}}</td>
                                            <td class="text-truncate">{{ $radicado->asunto}}</td>
                                            <td>{{ $radicado->origen_correo}}</td>
                                            <td class="text-truncate">{{ $radicado->origen_cel}}</td>
                                            <td class="text-truncate">{{ $radicado->respuesta}}</td>
                                            <td>{{ $radicado->user->name}}</td>
                                            <!--REVISADO POR-->
                                            @if (!$radicado->respuesta)
                                            <td> |</td>
                                            @else
                                                @foreach ($users as $user)
                                                    @if ($user->id == $radicado->respon_id)
                                                        <td>{{ $user->name}}</td>
                                                    @endif
                                                @endforeach
                                            @endif
                                            
                                            <td class="text-truncate">{{ $radicado->fech_start_radic}} | {{$radicado->time_start_radic}}</td>
                                            <td class="text-truncate">{{ $radicado->fech_recive_dir}} | {{$radicado->time_recive_dir}}</td>
                                            <td class="text-truncate">{{ $radicado->fech_recive_radic}} | {{$radicado->time_recive_radic}}</td>
                                    </tr>
                                @endif
                            @endif
                            @endforeach
                        </tbody>
                    </table>   
                @endif
            @endif
        </div>
        <div class="container text-center">
            <div class="col">
                <a name="" id="" class="p-2 btn btn-primary text-capitalize" href="{{route('Report.ExportAR')}}" role="button">generar reporte completo</a>
            </div>
        </div>
                  
    </div>

<!-- piecera-->
    <div class="row footer-home b-show-top">
      <div><p class="foo-title">estados</p></div>
      <div><i class="far fa-circle"></i></div>
      @if (Auth::user()->type_user == 2)
            <div><p class="foo-txt">Creado</p></div>
        @else
            @if (Auth::user()->type_user == 3)
                <div><p class="foo-txt">Recibido</p></div>    
            @endif
        @endif

      <div><i class="fas fa-circle status-send"></i></div>
      <div><p class="foo-txt">Pendientes</p></div>

      <div><i class="fas fa-circle status-recive-dir"></i></div>
      <div><p class="foo-txt">Entregados</p></div>

      <!--reset contador-->
      <!--
        <form method="POST" action="{{action('RegctrolController@restarFechRadic')}}">
          @csrf
          <button class="btn btn-primary" type="submit">reset contador</button>
        </form>
      -->
    </div>

@endsection