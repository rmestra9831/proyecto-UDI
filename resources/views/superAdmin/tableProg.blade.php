<table class="table table-striped hover" id="users" class="display">
        <thead>
            <tr class="text-center">
                <th>Programa</th>
                <th>Correo</th>
                <th>Sede</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programas as $programa)
                <tr>
                    <td>{{$programa->name}}</td>
                    <td>{{$programa->correo_director}}</td>
                    <td class="text-capitalize"> @foreach ($sedes as $sede) @if ($sede->id == $programa->sede) {{$sede->name}} @endif @endforeach </td>
                    <td class="text-center justify-content-center d-flex">
                        <button id="btnEditProg" class="btn btn-primary m-auto" value="{{$programa->id}}" data-toggle="modal" data-target="#editModalProg">Editar</button>
                        <form class="m-auto" method="POST" action="{{action('SuperadmController@deleteProg', $programa->id)}}">
                            @method('POST') @csrf          
                            <button id="btnDelete" class="btn btn-danger" value="{{$programa->id}}" >Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @include('components.modalEditProg')
        </tbody>
    </table>
    
    