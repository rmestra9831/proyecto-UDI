@extends('layouts.app')
@section('title','| Nuevo radicado')
@include('components.spinner')
@section('content-panel')

<!-- cabecera del contenido-->
<div class="row title-content">
    <h2 class="text-center text-capitalize title">nuevo radicado <strong>{{$num_more}}-{{$year}}</strong></h2>
</div>
<!--cuerpo delcontenido -->
<div class="row justify-content-md-center">
    <div class="container">
    @include('common.ErrorList')
<hr>
        <form class="needs-validation " action="{{route('reg-ctrol.store')}}" method="post" id="form-create">
          @csrf
          <div class="row">
            <!-- nombres y apellidos-->
              <div class="col-6">
                <div class="row">
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-lg col-form-label" for="name">nombres</label>
                    <input type="text"class="form-control text-capitalize @error('name') is-invalid @enderror  form-control-lg" name="name" id="name" aria-describedby="helpId" placeholder="Jhon" value="{{old('name')}}">
                    @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                  </div>
        
                  <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-lg col-form-label" for="last_name">apellidos</label>              
                    <input type="text"class="text-capitalize @error('last_name') is-invalid @enderror form-control form-control-lg" name="last_name" id="last_name" aria-describedby="helpId" placeholder="Perez Perez" value="{{old('last_name')}}">
                    @error('last_name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                  </div>
                </div>
              </div>
            <!-- selects-->
            
                <div class="col-6">
                  <div class="row">
                      <div class="col-6 form-group" no-margin>
                          <label class=" col-form-label-lg col-form-label text-capitalize" for="program_id">dependencia destino</label>              
                          <select name="program_id" id="" class="form-control form-control-lg @error('program_id') is-invalid @enderror">
                            <option class="text-capitalize" value="{{ old('program_id') }}">
                              {{-- traer la variable de sesión recuperada --}}
                              @foreach ($programas as $programa)
                                @if (old('program_id') == $programa->id)
                                  @if (old('program_id') == 1)
                                    {{$programa->name}}    
                                  @else
                                    Dirección de {{$programa->name}} 
                                  @endif                               
                                @endif
                              @endforeach
                              @if (!old('program_id')) Selección @endif
                            </option>
                            @foreach ($programas as $programa)
                              @if ($programa->id != 1)
                                <option class="" value="{{$programa->id}}">Dirección de {{$programa->name}}</option>
                              @else
                                <option class="" value="{{$programa->id}}">{{$programa->name}}</option>
                              @endif
                            @endforeach
                          </select>
                          @error('program_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                        <div class="col-6 form-group" no-margin>
                          <label class=" col-form-label-lg col-form-label text-capitalize" for="sendTo_id">supervisión</label>
                          <select name="sendTo_id" id="sendTo_id" class="text-capitalize form-control form-control-lg @error('sendTo_id') is-invalid @enderror">
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
                    <select name="type_motivo" id="type_motivo" class="@error('type_motivo') is-invalid @enderror form-control form-control-lg">
                      <option class="dropdown-item" value=" {{old('type_motivo')}} ">
                        @if (old('type_motivo') == 1) Administrativo  @endif
                        @if (old('type_motivo') == 2) Academico  @endif
                        @if (!old('type_motivo')) Tipo  @endif
                      </option> 
                      {{-- seleccion academico --}}
                        @if (old('type_motivo') == 1)
                          <option class="dropdown-item" value="2">Academico</option>                                          
                          <option class="dropdown-item" value="">Tipo</option>                  
                        @endif
                      {{-- seleccion academico --}}
                        @if (old('type_motivo') == 2)
                          <option class="dropdown-item" value="1">Administrativo</option>                  
                          <option class="dropdown-item" value="">Tipo</option>                                          
                        @endif
                      {{-- seleccion academico --}}
                        @if (!old('type_motivo'))
                          <option class="dropdown-item" value="1">Administrativo</option>
                          <option class="dropdown-item" value="2">Academico</option>                                                            
                        @endif
                    </select>
                  </div>
                  <!-- select de academico-->
                  <select name="motivo_id" id="motivo_select" class="form-control form-control-lg @error('motivo_id') is-invalid @enderror" @if($errors->has('motivo_id')) @else disabled @endif >
                    <option class="" value=" {{old('motivo_id')}} " vname="">
                        {{-- traer la variable de sesión recuperada --}}
                        @foreach ($motivos as $motivo)
                          @if (old('motivo_id') == $motivo->id)
                            {{$motivo->name}}                                
                          @endif
                        @endforeach
                        @if (!old('motivo_id')) Selección @endif  
                    </option>    
                      <!-- Select del sector academico -->
                      <div class="list_ac">                                     
                        @foreach ($motivos as $motivo)
                          @if ($motivo->type_motivo != 3)
                            <option  class="" id="motivo_select_op" value="{{$motivo->id}}" vtypemotivo="{{$motivo->type_motivo}}" vname="{{$motivo->name}}">{{$motivo->name}}</option>
                          @endif
                        @endforeach
                        @foreach ($motivos as $motivo)
                          @if ($motivo->type_motivo == 3)
                            <option  class="" id="motivo_select_op" value="{{$motivo->id}}" vtypemotivo="{{$motivo->type_motivo}}" vname="{{$motivo->name}}">{{$motivo->name}}</option>
                          @endif
                        @endforeach
                      </div>
                  </select>
                  @error('motivo_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
              </div>
                <div class="col-6 form-group" no-margin>
                    <label class="text-capitalize col-form-label-lg col-form-label" for="asunto">asunto</label>            
                    <input value="selección" type="text" class="form-control form-control-lg @error('last_name') is-invalid @enderror bl-form-text" name="asunto" id="asunto" disabled placeholder="Asunto" data-word-limit="120" {{old('asunto')}}/>
                </div>
              
              <div class="col-6 form-group" no-margin>
                <label class=" col-form-label-lg col-form-label" for="number_contacto">Número de Contacto</label>            
                <input value="{{old('origen_cel')}}" maxlength="14" type="text"class="text-capitalize form-control form-control-lg @error('origen_cel') is-invalid @enderror" name="origen_cel" id="number_contacto" aria-describedby="helpId" placeholder="(123) 456-7890">
                @error('origen_cel')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
              </div>
    
              <div class="col-6 form-group" no-margin>
                <label class="text-capitalize col-form-label-lg col-form-label" for="origen_correo">correo</label>
                <input type="text"class="text-lowercase @error('origen_correo') is-invalid @enderror form-control form-control-lg" name="origen_correo" id="origen_correo" aria-describedby="helpId" placeholder="Correo de origen" value="{{old('origen_correo')}}">
                @error('origen_correo')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
              </div>
              
              <div class="col-12">
                <div class="row">
                  <!-- radio buttom tipo de atenciòn-->
                  <div class="col-6 form-group" no-margin>
                    <label class="col-form-label-lg col-form-label" for="atention">Tipo de Atención</label>  
                    <div class="card">
                      <div class="card-body">
                          <div class="">
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="normal" name="atention" class="custom-control-input" value="normal ">
                              <label class="custom-control-label" for="normal">Normal</label>
                            </div>

                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="urgente" name="atention" class="custom-control-input" value="urgente ">
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


</div>

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
