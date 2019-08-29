@extends('layouts.app')
@section('title','| Nuevo radicado')
@section('content-panel')


<!-- cabecera del contenido-->
<div class="row title-content">
    <h2 class="text-center text-capitalize title">nuevo radicado <strong>{{$num_more}}-{{$year}}</strong></h2>
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
                    <label class="text-capitalize col-form-label-lg col-form-label" for="name">nombres</label>
                    <input type="text"class="text-capitalize @error('name') is-invalid @enderror form-control form-control-lg" name="name" id="name" aria-describedby="helpId" placeholder="Jhon" value="{{old('name')}}">
                  </div>
        
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-lg col-form-label" for="last_name">apellidos</label>              
                    <input type="text"class="text-capitalize @error('last_name') is-invalid @enderror form-control form-control-lg" name="last_name" id="last_name" aria-describedby="helpId" placeholder="Perez Perez" value="{{old('last_name')}}">
                  </div>
                </div>
              </div>
            <!-- selects-->
                <div class="col-6">
                  <div class="row">
                      <div class="col-6 form-group" no-margin>
                          <label class=" col-form-label-lg col-form-label text-capitalize" for="program_id">programa / destino</label>              
                          <select name="program_id" id="" class=" form-control form-control-lg @error('program_id') is-invalid @enderror">
                            <option class="text-capitalize" value="">Selección</option>                      
                            @foreach ($programas as $programa)
                            <option class="" value="{{$programa->id}}">dirección de {{$programa->name}}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="col-6 form-group" no-margin>
                          <label class=" col-form-label-lg col-form-label text-capitalize" for="sendTo_id">supervición</label>
                          <select name="sendTo_id" id="sendTo_id" class=" form-control form-control-lg @error('sendTo_id') is-invalid @enderror">
                              <option class="" value="1">dirección</option>                                          
                          </select>
                        </div>
                  </div>
                </div>
            <!-- selects-->
              <!-- SELECT DE MOTIVOS-->
              <div class="col-6 form-group">
                <label class="text-capitalize col-form-label-lg col-form-label" for="asunto">Motivo</label>            
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <select name="type_motivo" id="type_motivo" class="@error('sendTo_id') is-invalid @enderror btn btn-lg btn-outline-secondary">
                      <div class="dropdown-menu">
                        <option class="dropdown-item" value="">Tipo</option>                                          
                        <option class="dropdown-item" value="2">Academino</option>                                          
                        <option class="dropdown-item" value="1">Administrativo</option>
                      </div>                                    
                    </select>
                  </div>
                  <!-- select de academico-->
                  <select name="motivo_id" id="motivo_select_ac" class="form-control form-control-lg" disabled hidden>
                    <option class="" value="" vname="">Seleción</option>    
                      <!-- Select del sector academico -->
                      <div class="list_ac">                                     
                        @foreach ($motivos as $motivo)
                          @if ($motivo->type_motivo == 2 || $motivo->type_motivo == 3)
                            <option class="" id="itemSelecMotivo" value="{{$motivo->id}}" vname="{{$motivo->name}}">{{$motivo->name}}</option>
                          @endif
                        @endforeach
                      </div>
                  </select>
                  <!-- select de Administrativo-->
                  <select name="motivo_id" id="motivo_select_ad" class="form-control form-control-lg" disabled>
                    <option class="" value="" vname="">Seleción</option>    
                      <!-- Select del sector academico -->
                      <div class="list_ad">                                     
                        @foreach ($motivos as $motivo)
                          @if ($motivo->type_motivo == 1 || $motivo->type_motivo == 3)
                            <option class="" id="itemSelecMotivo" value="{{$motivo->id}}" vname="{{$motivo->name}}">{{$motivo->name}}</option>
                          @endif
                        @endforeach
                      </div>
                  </select>
                </div>
              </div>
            <!--
              <div class="col-9">
                <label class="text-capitalize col-form-label-lg col-form-label" for="motivo_id">motivo</label>
                <div class="card">
                  <div class="col-6 form-group" no-margin>
                    <select name="motivo_id" id="motivo_select" class=" form-control form-control-lg">
                        <option class="" value="" vname="">Seleción</option>                                          
                      @foreach ($motivos as $motivo)
                      <option class="" id="itemSelecMotivo" value="{{$motivo->id}}" vname="{{$motivo->name}}">{{$motivo->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            -->
                <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-lg col-form-label" for="asunto">asunto</label>            
                    <input value="" type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror bl-form-text" name="asunto" id="asunto" disabled placeholder="Asunto" data-word-limit="120" {{old('asunto')}}/>
                </div>
              
              <div class="col-6 form-group" no-margin>
                <label class="text-capitalize col-form-label-lg col-form-label" for="number_contacto">número de contacto</label>            
                <input maxlength="14" type="text"class="text-capitalize form-control form-control-lg" name="origen_cel" id="number_contacto" aria-describedby="helpId" placeholder="(123) 456-7890">
              </div>
    
              <div class="col-6 form-group" no-margin>
                <label class="text-capitalize col-form-label-lg col-form-label" for="origen_correo">correo</label>
                <input type="text"class="text-lowercase @error('origen_correo') is-invalid @enderror form-control form-control-lg" name="origen_correo" id="origen_correo" aria-describedby="helpId" placeholder="Correo de origen" value="{{old('origen_correo')}}">
              </div>
              
              <div class="col-12">
                <div class="row">
                  <!-- radio buttom tipo de atenciòn-->
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-lg col-form-label" for="atention">Tipo de Atención</label>  
                    <div class="card">
                      <div class="card-body">
                          <div class="">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="normal" name="atention" class="custom-control-input @error('atention') is-invalid @enderror" value="normal">
                              <label class="custom-control-label" for="normal">Normal</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="urgente" name="atention" class="custom-control-input @error('atention') is-invalid @enderror" value="urgente">
                              <label class="custom-control-label" for="urgente">Urgente</label>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!-- obsevaciones de registro y control-->
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-lg col-form-label" for="observaciones">observaciones</label>  
                    <textarea class="form-control form-control-lg @error('observaciones') is-invalid @enderror" name="observaciones" id="observaciones" cols="30"></textarea>
                    <small id="emailHelp" class="form-text text-muted">Observaciones hechas por Admisiones Registro</small>
                  </div>
                  <!-- respuesta del radicado-->
                  <!--
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-lg col-form-label" for="respuesta">respuesta</label>  
                    <textarea class="form-control form-control @error('observaciones') is-invalid @enderror" name="respuesta" id="respuesta" cols="30"></textarea>
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
          <button btn-norm data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary">Guardar</button>
            <a btn-norm name="" id="save_radic" class="btn btn-secondary"
            @if (Auth::user()->type_user == 2)
              href="{{route('reg-ctrol.index')}}"
              @else
                @if (Auth::user()->type_user == 3)
                  href="{{route('direction.index')}}"
                @else
                      
               @endif
            @endif
            role="button">Volver</a>
        </div>
    </div>

    @include('components.spinner')
</div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
