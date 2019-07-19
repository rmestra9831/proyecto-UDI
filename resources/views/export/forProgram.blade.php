<table>
    <thead>
    <tr>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">NUMERO DE RADICADO</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">NOMBRES</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">APELLIDOS</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">PROGRAMA</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">DIRIGIDO A</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">MOTIVO</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">ASUNTO</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">CORREO</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">CELULAR</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">RESPUESTA</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">CREADO POR</th>
        <th style="
            background-color: #c3c3c3;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 30px;
            border: 2px solid black;
            font-weight: 800;
        ">RESPONDIDO POR</th>
        <th style="
            background-color: #ffffff;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 40px;
            border: 2px solid black;
            font-weight: 800;
        ">FECHA DE CREACIÓN</th>
        <th style="
            background-color: #ffe710;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 40px;
            border: 2px solid black;
            font-weight: 800;
        ">FECHA ENVIADO A DIRECCIÓN</th>
        <th style="
            background-color: #00d3ea;
            color: #000000;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 40px;
            border: 2px solid black;
            font-weight: 800;
        ">RECIBIDO DE DIRECCIÓN</th>
        <th style="
            background-color: ##183bff;
            color: #ffffff;
            font-size: 15px;
            text-align: center;
            height: 25px;
            width: 40px;
            border: 2px solid black;
            font-weight: 800;
        ">ENTREGADO FINAL</th>
        
    </tr>
    </thead>

    <tbody>
    @foreach($radicados as $radicado)
        
        @if ($radicado->fech_recive_radic != null || $radicado->fech_notifi_end != null && $radicado->fech_notifi_end == null)
            @if ($radicado->fech_delivered != null)
                <tr>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->fechradic_id}}-{{ $radicado->year}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->name}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->last_name}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->program->name}}</td>
                    <!--DIRIGIDO A-->
                    @foreach ($programas as $programa)
                      @if ($programa->id == $radicado->sendTo_id)
                      <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $programa->name}}</td>
                      @endif
                    @endforeach 
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->motivo->name}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->asunto}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->origen_correo}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->origen_cel}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->respuesta}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->user->name}}</td>
                    <!--REVISADO POR-->
                    @if (!$radicado->respuesta)
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;"> |</td>
                    @else
                        @foreach ($users as $user)
                            @if ($user->id == $radicado->respon_id)
                                <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $user->name}}</td>
                            @endif
                        @endforeach
                    @endif
                    
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_start_radic}} | {{$radicado->time_start_radic}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_send_dir}} | {{$radicado->time_send_dir}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_recive_radic}} | {{$radicado->time_recive_radic}}</td>
                    <td style="background-color: #3bff18; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_delivered}} | {{$radicado->time_delivered}}</td>
                </tr>  
            @else
                <tr>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->fechradic_id}}-{{ $radicado->year}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->name}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->last_name}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->program->name}}</td>
                    <!--DIRIGIDO A-->
                    @foreach ($programas as $programa)
                      @if ($programa->id == $radicado->sendTo_id)
                      <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $programa->name}}</td>
                      @endif
                    @endforeach 
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->motivo->name}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->asunto}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->origen_correo}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->origen_cel}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->respuesta}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->user->name}}</td>
                    <!--REVISADO POR-->
                    @if (!$radicado->respuesta)
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;"> |</td>
                    @else
                        @foreach ($users as $user)
                            @if ($user->id == $radicado->respon_id)
                                <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $user->name}}</td>
                            @endif
                        @endforeach
                    @endif
                    
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_start_radic}} | {{$radicado->time_start_radic}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_send_dir}} | {{$radicado->time_send_dir}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_recive_radic}} | {{$radicado->time_recive_radic}}</td>
                    <td style="background-color: #ffe710; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_delivered}} | {{$radicado->time_delivered}}</td>
                </tr>
            @endif
        @else
            <tr>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->fechradic_id}}-{{ $radicado->year}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->name}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->last_name}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->program->name}}</td>
                    <!--DIRIGIDO A-->
                    @foreach ($programas as $programa)
                      @if ($programa->id == $radicado->sendTo_id)
                      <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $programa->name}}</td>
                      @endif
                    @endforeach 
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->motivo->name}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->asunto}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->origen_correo}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->origen_cel}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->respuesta}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $radicado->user->name}}</td>
                    <!--REVISADO POR-->
                    @if (!$radicado->respuesta)
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;"> |</td>
                    @else
                        @foreach ($users as $user)
                            @if ($user->id == $radicado->respon_id)
                                <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px;">{{ $user->name}}</td>
                            @endif
                        @endforeach
                    @endif
                    
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_start_radic}} | {{$radicado->time_start_radic}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_send_dir}} | {{$radicado->time_send_dir}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_recive_radic}} | {{$radicado->time_recive_radic}}</td>
                    <td style="background-color: #ffffff; border: 1px solid #000000; font-size: 12px; height: 20px; text-justify: auto">{{ $radicado->fech_delivered}} | {{$radicado->time_delivered}}</td>
            </tr>
        @endif

    @endforeach
    </tbody>
</table>
