@extends('layouts.app')
@section('title','| Directores')
@section('content-panel')

<!-- cabecera del contenido-->
    <div class="row title-content">
        <h2 class="text-center text-capitalize title">Contadores de Radicados</h2>
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
                    <div class="card p-4 item_user desing-1_1" style="grid-row: 1/3 !important; grid-column: 1/4 !important;">
                        <h5 class="text-capitalize text-center">Listado</h5>
                        <div class="par">
                            @include('superAdmin.tableSedes')
                        </div>
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
            
            
                $('.table #btnEdit').click(function(){
                  //$('#content_edit_user').load("public/views/admin/editUser.php");
                    $valor = $(this).val();
                    $url = window.location.origin + '/admin/'+$valor+"/edit_dir";
                    $('.user_create #frame_show').attr("src", $url);
                
                    //alert("el valor es: "+ $valor);
                });
        
            });
        
        </script>
    @endsection 

    
