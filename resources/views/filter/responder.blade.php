{{-- autenticacion de usuario de dirección --}}
@if (Auth::user()->type_user == 3)
    @if (count($query_responder_dir)>0)
        @foreach ($query_responder_dir as $radicado)
            <div  class="col-11 content-card">
                @include('components.cards')
            </div>  
        @endforeach
    @else
        <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron radicados para responder</h4></div>    
    @endif
{{-- autenticación de usuario 3 --}}
@else
    @if (Auth::user()->type_user == 4)

    @else
        @if (Auth::user()->type_user == 4)
        
        @endif
    @endif
@endif