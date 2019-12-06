<table class="table table-striped hover" id="users" class="display">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Sede</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td class="text-capitalize">{{$user->name}}</td>
                <td>@foreach ($roles as $rol)
                        @if ($rol->id == $user->type_user)
                            {{$rol->name_role}}
                            @foreach ($programas as $programa)
                                @if ($programa->id == $user->program_id)
                                    @if ($user->program_id != 1)
                                        | <strong>{{$programa->name}}</strong>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </td>
                <td class="text-capitalize">@foreach ($sedes as $sede) @if ($sede->id == $user->sede) {{$sede->name}} @endif @endforeach</td>
                <td><button id="btnEditUser" value=" {{$user->id}} " class="btn btn-primary" data-toggle="modal" data-target="#editModalUser" >Editar</button></td>
            </tr>
            @endforeach
            @include('components.modalEditUser') 
    </tbody>
</table>

<script>

    editUser(id,data){

        if(id){
            $.ajax{
                url:'url',
                data: {},
                dataType:'html',
                type:'post',
                beforeSend: function(){
                    console.log("enviando...")
                },
                success: function(response){
                    console.log(response)
                }

            }
        }
    }

</script>

