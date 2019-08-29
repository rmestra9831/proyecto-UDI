<table class="table table-striped hover table-datas" id="users" class="display">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Programa</th>
            <th>Correo Del Director</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($programas as $programa)
            <tr>
                <td>{{$programa->name_dir}}</td>
                <td>{{$programa->name}}</td>
                <td>{{$programa->correo_director}}</td>
                <td><button id="btnEdit" class="btn btn-primary" value="{{$programa->id}}" >Editar</button></td>                    
            </tr>
        @endforeach
    </tbody>
</table>


