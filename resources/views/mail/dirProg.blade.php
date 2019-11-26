<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<p><strong>Estimado(a) Ing.
  @foreach ($e_users as $e_user)
    @if ($e_user->program_id == $e_data->program->id )
        sass
    @endif
  @endforeach
</strong></p>
<p>Nombre: <strong></strong></p>
<p>aqui va todo el contenido delcorreo</p>


</body>
</html>