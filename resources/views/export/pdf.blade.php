<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Respuesta al radicado</title>
        <style>
            @font-face{
                font-family: Century;
                src: url('../fonts/TRCenturyGothicRegular.ttf');
            }
            body{
                margin: 1.5cm 2.5cm;
                font-weight: lighter;
                font-size: 12pt;
            }
            .title_fech{
            text-align: left;
            font-family: 'Century', sans-serif;
            }
            .contenido{
            font-size: 20px;
            }
            #primero{
            background-color: #ccc;
            }
            #segundo{
            color:#44a359;
            }
            #tercero{
            text-decoration:line-through;
            }
        </style>
    </head>
    <body>
        @foreach ($radicados as $radicado)
        <p class="title_fech">Barrancabermeja, {{$fechaCompleto}} </p>
            
        @endforeach
    </body>
</html>