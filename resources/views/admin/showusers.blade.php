@extends('layouts.app')
@section('title','| Exportaciones')
@section('content-panel')

<!-- cabecera del contenido-->
    <div class="row title-content">
        <h2 class="text-center text-capitalize title">usuarios</h2>
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
                            @include('admin.tableUsers')
                        </div>
                    </div>
                    <!-- Se edita el usuario seleccionado-->
                    <div class="card p-4 user_create desing-1_2">
                        <h5 class="text-capitalize text-center">Editar</h5>
                        <div class="">
                            editar
                        </div>
                    </div>
                    <!-- Se crean los usuarios-->
                    <div class="card p-4 desing-2">
                            <h5 class="text-capitalize text-center">Crear nuevo usuario</h5>
                    </div>
                </div>
            </div>

    </div>

    <script>
        $(document).ready(function () {
            $('#users').DataTable({
                "scrollY":        "200px",
                "scrollCollapse": true,
                "lengthMenu": [[5, 10, 25, 50], [5, 10, 25, 50]],
            });
        });
    </script>
<!-- piecera-->
    

@endsection