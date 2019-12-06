<table class="table table-striped hover table-datas" id="users" class="display">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Programa</th>
            <th>Correo Del Director</th>
            <th>Sede</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($programas as $programa)
            <tr>
                <td class="text-capitalize">
                    @foreach ($users as $user)
                        @if ($user->program_id == $programa->id)
                            {{$user->name}}
                        @endif
                    @endforeach
                </td>
                <td>{{$programa->name}}</td>
                <td>{{$programa->correo_director}}</td>
                <td class="text-capitalize"> @foreach ($sedes as $sede) @if ($sede->id == $programa->sede) {{$sede->name}} @endif @endforeach </td>
            </tr>
        @endforeach
    </tbody>
</table>


