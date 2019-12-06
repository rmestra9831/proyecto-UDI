@extends('layouts.app')
@section('title','| Programas')
@section('content-panel')

<!-- cabecera del contenido-->
    <div class="row title-content">
        <h2 class="text-center text-capitalize title">Programas</h2>
    </div>
<!--cuerpo delcontenido -->
    <div class="row justify-content-md-center cont-panel">
        @if(Session::has('alert-ok-radic'))
          {{ Session::get('alert-ok-radic') }}
        @endif     
        
        <div class=" cont-panel-adm-user">
            <div class="container">
                <!-- Se muestran los usuarios-->
                <div class="card p-4 item_user desing-1_1" style="grid-column: 1/4 !important;">
                    @include('common.success') {{--mostrado de alertas--}}
                    <h5 class="text-capitalize text-center">Listado</h5>
                    <div class="par">
                        @include('superAdmin.tableProg')
                    </div>
                </div>
                <!-- Se crean los usuarios-->
                <div class="card p-4 desing-2">
                        <h5 class="text-capitalize text-center">Crear nuevo Programa</h5>
                        <form method="POST" action="{{ action('SuperadmController@registerProg') }}" style="margin: auto 5%;">
                            @csrf
                            <div class="form-group row">
                                <div class="col">
                                    <input autocomplete="off" id="name" placeholder="Nombre del Programa" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input autocomplete="off" id="correo_director" placeholder="Correo del Programa" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="correo_director" value="{{ old('name') }}" required autocomplete="off" autofocus>
                                </div>
                                <div class="col">
                                    <select name="sede" id="sede" class="form-control form-control-sm text-capitalize">
                                        <option>Seleccióna la sede</option>
                                        @foreach ($sedes as $sede)
                                        <option  class="text-capitalize" id="motivo_select_op" value="{{$sede->id}}" >{{$sede->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-outline-secondary btn-sm btn-block">
                                        {{ __('Registrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                "scrollY":        "200px",
                "scrollCollapse": true,
                "lengthMenu": [[-1], ['All']],
            });

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}}
            );

            var btnEditProg = document.querySelectorAll('#btnEditProg');
            $('.table #btnEditProg').click(function(){
                $valor = $(this).val();

                $.ajax({
                    url: "/infoProgramas?val="+$valor,
                    type:"GET",
                    beforeSend:function(){
                        $('#staticBackdropProgram').html('Cargando...');
                    },
                    success:function(response){
                        $correo_program = response['program'][0]['correo_director'];
                        $name_program = response['program'][0]['name'];
                        $id_program = response['program'][0]['id'];
                        $sedes = response['sede'];
                        console.log($correo_program);
                        $('#staticBackdropProgram').html('Editar el programa de '+$name_program);
                        // datos que se resiven por metodo
                        for(s=0; s < $sedes.length; s++){
                            if ($id_program == $sedes[s]['id'] ) {
                                $status = "selected";
                            }else{$status = "";}
                            $('#select_sede').append("<option class='text-capitalize' id='selectOption_user_rol' "+$status+" value="+$sedes[s]["id"]+">"+$sedes[s]["name"]+"</option>");
                        }
                        
                        $('.correo_prog').attr("value",$correo_program);
                        $('.xtreme_p').attr("gateway",$id_program);
                    },
                    error:function(){
                        $('.modal-body').html("error");
                    }
                    
                })
            });
            $('.xtreme #btnSaveUpdateProg').click(function(){
                    $correo_prog = $('.xtreme .correo_prog').val();
                    $id_sede = $('#select_sede').val();
                    $gateway = $('.xtreme_p').attr("gateway");
                    console.log($correo_prog);
                    $.ajax({
                        url: $gateway+"/superAdmin",
                        type:"PUT",
                        methos:"PUT",
                        data:{correo:$correo_prog, sede:$id_sede, id:$gateway},
                        beforeSend: function(){
                           $('#btnSaveUpdateUser').html("Loading");
                        },
                        success:function(response){
                            console.log(response);
                            $('#btnSaveUpdateUser').html("Actualizar");
                            $name = response.name;
                            $('#staticBackdropLabel').html('Editando a '+$name);
                            $('.showAlert').append(
                                "<div class='alert alert-success alert-dismissible fade show' role='alert'>"+
                                    "<strong>! Excelente ¡</strong> Programa editado correctamente."+
                                    "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>"+
                                    "<span aria-hidden='true'>&times;</span>"+
                                    "</button>"+
                                "</div>"
                            );
                        }

                    });
                });
        });
    </script> 
@endsection