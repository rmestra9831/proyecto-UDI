<table class="table table-striped hover" id="users" class="display">
        <thead>
            <tr>
                <th>Director</th>
                <th>Programa</th>
                <th>Correo</th>
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
    
    