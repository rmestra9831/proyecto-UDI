@extends('layouts.appLogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" style="margin: auto 5%;">
                                @csrf
        
                                <div class="form-group row">
                                    
                                    <div class="col-md-6">
                                        <input autocomplete="off" id="name" placeholder="Nombre de Usuario" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <select name="type_user" id="" class="text-capitalize form-control custom-select custom-select-sm form-control-sm @error('program_id') is-invalid @enderror">
                                            <option class="text-capitalize" value="">Cargo</option>                      
                                            @foreach ($roles as $rol)
                                                <option class="text-capitalize" value="{{$rol->id}}">{{$rol->name_role}}</option>          
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
      
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="password" placeholder="Contraseña" type="" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
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
                                    <div class="col-md-6 ">
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
</div>
@endsection
