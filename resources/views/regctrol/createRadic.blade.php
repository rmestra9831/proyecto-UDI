@extends('layouts.app')
@section('title','| Nuevo radicado')
@section('content-panel')

<!-- cabecera del contenido-->
<div class="row title-content">
    <h2 class="text-center text-capitalize title">nuevo radicado <strong>#{{$num_more}}-{{$year}}</strong></h2>
</div>
<!--cuerpo delcontenido -->
<div class="row justify-content-md-center">
    <div class="container">
<hr>
        <form class="needs-validation" action="{{route('reg-ctrol.store')}}" method="post" id="form-create">
          @csrf
          <div class="row">
            <!-- nombres y apellidos-->
              <div class="col-6">
                <div class="row">
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-sm col-form-label" for="name">nombres</label>
                    <input type="text"class="text-capitalize @error('name') is-invalid @enderror form-control form-control-sm" name="name" id="name" aria-describedby="helpId" placeholder="Jhon" value="{{old('name')}}">
                  </div>
        
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-sm col-form-label" for="last_name">apellidos</label>              
                    <input type="text"class="text-capitalize @error('last_name') is-invalid @enderror form-control form-control-sm" name="last_name" id="last_name" aria-describedby="helpId" placeholder="Perez Perez" value="{{old('last_name')}}">
                  </div>
                </div>
              </div>
            <!-- selects-->
                <div class="col-6">
                  <div class="row">
                      <div class="col-6 form-group" no-margin>
                          <label class="text-capitalize col-form-label-sm col-form-label" for="program_id">programa</label>              
                          <select name="program_id" id="" class="text-capitalize form-control form-control-sm @error('program_id') is-invalid @enderror">
                            <option class="text-capitalize" value="">Seleción</option>                      
                            @foreach ($programas as $programa)
                            <option class="text-capitalize" value="{{$programa->id}}">{{$programa->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-6 form-group" no-margin>
                          <label class="text-capitalize col-form-label-sm col-form-label" for="sendTo_id">desitno</label>
                          <select name="sendTo_id" id="sendTo_id" class="text-capitalize form-control form-control-sm @error('sendTo_id') is-invalid @enderror">
                              <option class="text-capitalize" value="">Seleción</option>                                          
                            @foreach ($programas as $programa)
                            <option class="text-capitalize" value="{{$programa->id}}">{{$programa->name}}</option>
                            @endforeach
                          </select>
                        </div>
                  </div>
                </div>
            <!-- selects-->
              <!-- SELECT DE MOTIVOS-->
              <div class="col-6 form-group" no-margin>
                <label class="text-capitalize col-form-label-sm col-form-label" for="motivo_id">motivo</label>
                <select name="motivo_id" id="motivo" class="text-capitalize form-control form-control-sm">
                    <option class="text-capitalize" value="">Seleción</option>                                          
                  @foreach ($motivos as $motivo)
                  <option class="text-capitalize" value="{{$motivo->id}}">{{$motivo->name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-6 form-group" no-margin>
                  <label class="text-capitalize col-form-label-sm col-form-label" for="asunto">asunto</label>            
                  <input type="text" class="form-control form-control-sm @error('last_name') is-invalid @enderror bl-form-text" name="asunto" id="asunto" placeholder="Asunto" data-word-limit="120" {{old('asunto')}} />
              </div>
    
              <div class="col-6 form-group" no-margin>
                <label class="text-capitalize col-form-label-sm col-form-label" for="number_contacto">numero de contacto</label>            
                <input maxlength="14" type="text"class="text-capitalize form-control form-control-sm" name="origen_cel" id="number_contacto" aria-describedby="helpId" placeholder="(123) 456-7890">
              </div>
    
              <div class="col-6 form-group" no-margin>
                <label class="text-capitalize col-form-label-sm col-form-label" for="origen_correo">correo</label>
                <input type="text"class="text-capitalize @error('origen_correo') is-invalid @enderror form-control form-control-sm" name="origen_correo" id="origen_correo" aria-describedby="helpId" placeholder="Correo de origen" value="{{old('origen_correo')}}">
              </div>
              
              <div class="col-12">
                <div class="row">
                  <!-- radio buttom tipo de atenciòn-->
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-sm col-form-label" for="atention">Tipo de Atenciòn</label>  
                    <div class="card">
                      <div class="card-body">
                          <div class="">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('atention') is-invalid @enderror" type="radio" name="atention" id="normal" value="normal" checked>
                                <label class="form-check-label" for="normal">Normal</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input @error('atention') is-invalid @enderror" type="radio" name="atention" id="urgente" value="urgente">
                              <label class="form-check-label" for="urgente">Urgente</label>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!-- obsevaciones de registro y control-->
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-sm col-form-label" for="observaciones">observaciones</label>  
                    <textarea class="form-control form-control-sm @error('observaciones') is-invalid @enderror" name="observaciones" id="observaciones" cols="30"></textarea>
                    <small id="emailHelp" class="form-text text-muted">Observaciones hechas por Registro y Control</small>
                  </div>
                  <!-- respuesta del radicado-->
                  <!--
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-sm col-form-label" for="respuesta">respuesta</label>  
                    <textarea class="form-control form-control-sm @error('observaciones') is-invalid @enderror" name="respuesta" id="respuesta" cols="30"></textarea>
                    <small id="emailHelp" class="form-text text-muted">Respuesta del radicado</small>
                  </div>
                  -->
                </div>
              </div>
          </div>
          @include('components.alertsModal')
        </form>
        <hr>
        <!--botones-->
        <div class="text-center">
          <button btn-norm type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary">Guardar</button>
          <button btn-norm type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>

@endsection
