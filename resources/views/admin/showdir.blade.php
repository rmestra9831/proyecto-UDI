@extends('layouts.app')
@section('title','| Directores')
@section('content-panel')

<!-- cabecera del contenido-->
    <div class="row title-content">
        <h2 class="text-center text-capitalize title">Directores</h2>
    </div>
<!--cuerpo delcontenido -->
    <div class="row justify-content-md-center cont-panel">

        @include('common.success')
        @if(Session::has('alert-ok-radic'))
          {{ Session::get('alert-ok-radic') }}
        @endif     
        
        <div class=" cont-panel-adm-user">
                <div class="container">
                    <!-- Se muestran los usuarios-->
                    <div class="card p-4 item_user desing-1_1">
                        <h5 class="text-capitalize text-center">Listado</h5>
                        <div class="par">
                            @include('admin.tableDir')
                        </div>
                    </div>
                    <!-- Se edita el usuario seleccionado-->
                    <div class="card p-4 user_create desing-1_2">
                        <h5 class="text-capitalize text-center">Editar</h5>
                        <iframe id="frame_show" src="" frameborder="0">
                        </iframe>
                    </div>
                    <!-- Se crean los usuarios-->
                    <div class="card p-4 desing-2">
                        <h5 class="text-capitalize text-center">Crear nuevo Director</h5>
                            <form method="POST" action="{{ action('AdminController@registerDir') }}" style="margin: auto 5%;">
                                @csrf
        
                                <div class="form-group row">
                                    
                                    <div class="col-md-6">
                                        <input autocomplete="off" id="name_dir" placeholder="Nombre del Director" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name_dir" value="{{ old('name') }}" required autocomplete="off" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
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

    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                "scrollY":        "200px",
                "scrollCollapse": true,
                "lengthMenu": [[-1], ['All']],
            });

            function EditUser(){

            }

            $('.table #btnEdit').click(function(){
              //$('#content_edit_user').load("public/views/admin/editUser.php");
                $valor = $(this).val();
                $url = "http://localhost:8000/admin/"+$valor+"/edit_dir";
                $('.user_create #frame_show').attr("src", $url);

                //alert("el valor es: "+ $valor);
            });

        });

        
    </script>
<!-- piecera-->
    

@endsection