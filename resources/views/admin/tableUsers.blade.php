<table class="table table-striped hover" id="users" class="display">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                @foreach ($roles as $rol)
                    @if ($rol->id == $user->type_user)
                        <td>{{$rol->name_role}}</td>
                        <td><button id="btnEdit" class="btn btn-primary" value="{{$user->id}}" >Editar</button></td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

