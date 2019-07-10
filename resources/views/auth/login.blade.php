@extends('layouts.appLogin')

@section('content')
<div class="form">
    <div class="sec-head-log">
        <div>
            <img src="{{asset('img\logo-udi-completo.svg')}}" alt="">
        </div>
        <p>sistema de información registro y control</p>
    </div>
    <!-- seccion del formulario-->
    <div class="tt-login text-capitalize"><h4>iniciar sesión</h4></div>
    <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <div class="form-group row">
                    <div class="col-md-12 input-icon">
                        <input id="name" type="name" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="Usuario" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><i id="icon" class="far fa-user"></i>
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row">
                    <div class="col-md-12 input-icon">
                        <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="current-password"><i id="icon" class="fas fa-key"></i>
        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Recuerdame') }}
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-block btn-primary">
                            {{ __('Ingresar') }}
                        </button>
                    </div>
                </div>
    </form>
    <!-- seccion del pie de pagina del login-->
    <div class="sec-foot-log">
        <div>
            <p class="text-capitalize container-fluid">Copyright © 2019 Universidad de Investigación Y Desarrollo - UDI - .
                    Todos los derechos reservados. Desarrollado:</p>
            <p class="text-capitalize container-fluid">Richard andres mestra a. - Webmaster | Martha Cecilia Guarnizo García - Dirección ORI</p>
        </div>
    </div>
</div>
@endsection
