@extends('layouts.app')
@section('title','| Usuarios')
@section('content-panel')

<!-- cabecera del contenido-->
    <div class="row title-content">
        <h2 class="text-center text-capitalize title">usuarios</h2>
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
                        <h5 class="text-capitalize text-center">Listado</h5>
                        <div class="par">
                            @include('superAdmin.tableUsers')
                        </div>
                    </div>
                    <!-- Se crean los usuarios-->
                    <div class="card p-4 desing-2">
                        @include('common.success')
                        <h5 class="text-capitalize text-center">Crear nuevo usuario</h5>
                            <form method="POST" action="{{ action('SuperadmController@register') }}" style="margin: auto 5%;">
                                @method('POST') @csrf
        
                                <div class="form-group row">
                                    
                                    <div class="col-md-6">
                                        <input autocomplete="off" id="name" placeholder="Nombre de Usuario" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-3">
                                        <select id="select_cargo_superAdm" name="type_user" class="text-capitalize form-control custom-select custom-select-sm form-control-sm @error('program_id') is-invalid @enderror">
                                            <option class="text-capitalize" value="">Cargo</option>                      
                                            @foreach ($roles as $rol)
                                                <option class="text-capitalize" value="{{$rol->id}}">{{$rol->name_role}}</option>          
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <select disabled name="program_id" id="select_prog_superAdm" class="text-capitalize form-control custom-select custom-select-sm form-control-sm @error('program_id') is-invalid @enderror">
                                            <option class="text-capitalize" value="">Programa</option>                      
                                            @foreach ($programas as $programa)
                                                <option class="text-capitalize" value="{{$programa->id}}">{{$programa->name}}</option>          
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
      
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="password" placeholder="Contraseña" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control form-control-sm " placeholder="Confirmar Contraseña" name="password_confirmation" required autocomplete="new-password">
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
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }});

                //boton para guardar datos a actualizar
            

                function EditUser(){

                }
                
                var $btns_edit_user = document.querySelectorAll('#btnEditUser');
                $($btns_edit_user).click(function(){
                    $valor = $(this).val();

                    $.ajax({
                        url: "http://127.0.0.1:90/proyecto-UDI/public/test?val="+$valor,
                        type:"GET",

                        beforeSend:function(){
                            //abrir el modal e imprimir "cargando"
                            $('.elif').html("loading");
                        },
                        success:function(response){
                            // datos que se resiven por metodo
                            $name = response["user"][0]["name"];
                            $id_user = response["user"][0]["id"];
                            $actual_rol = response["user"][0]["type_user"];
                            $rol = response["rol"];
                            for(i=0; i < $rol.length; i++){
                                //console.log($rol[i]["name_role"]);
                                if($actual_rol == $rol[i]["id"]){
                                    $status = "selected";
                                }else{$status = ""}
                                $('#select_user_rol').append("<option class='text-capitalize' "+$status+" value="+$rol[i]["id"]+">"+$rol[i]["name_role"]+"</option>");
                            }
                            $('.elif').html("ya se otuvo");
                            $('.user_name').attr("value",$name);
                            $('.xtreme_u').attr("gateway",$id_user);
                        },

                        error:function(){
                            $('.modal-body').html("error");
                        }
                        
                    })
                });
                $('.xtreme #btnSaveUpdateUser').click(function(){
                
                    $valor = $(".user_name").val();
                    $id_type_user = $('.xtreme #select_user_rol').val();
                    $gateway = $('.xtreme_u').attr("gateway");
                    $.ajax({
                        url:"http://127.0.0.1:90/proyecto-UDI/public/edit_user/"+$gateway+"/superAdmin",
                        type:"PUT",
                        methos:"PUT",
                        data:{nombre:$valor,type_user:$id_type_user,id:$gateway},
                        beforeSend: function(){
                           // $('#btnSaveUpdateUser').html("Loading");
                        },
                        success:function(result){
                            console.log(result)
                        }

                    });
                });
            });

            //var $btns_save_update_user = document.getElementById('btnSaveUpdateUser');
            
        </script>
    @endsection
    <!-- piecera-->