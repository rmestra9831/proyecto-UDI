@if (session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Usuario Desabilitado</strong> {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@else
    @if (session('auth_status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error de Autenticación</strong> {{session('auth_status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
@endif

    