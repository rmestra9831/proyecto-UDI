@if (Auth::user()->type_user == 2)
  @if (count($query_important))
    @foreach ($query_important as $radicado)
      <div  class="col-11 content-card">
        @include('components.cards')
      </div>
    @endforeach
  @else
    <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron importantes</h4></div>        
  @endif

@else
  @if (Auth::user()->type_user == 3)
    @foreach ($query_important_dir as $radicado)
      @if (count($query_important_dir))
        @if ($radicado->fech_recive_dir == null)
          <div  class="col-11 content-card">
            <div class="unrecive" id="{{$radicado->id}}" valid="{{$radicado->id}}">
              <!-- formulario para actualizar el estado de recivido direccion-->
              <form action="/status/{{$radicado->slug}}" method="post">
                 @method('PUT')
                 @csrf
                   <input  name="time_recive_dir" type="hidden" value="{{date("h:i:s A")}}">
                   <input  name="fech_recive_dir" type="hidden" value="{{date("y/m/d")}}">
                <button class="btn btn-primary text-capitalize" type="submit">recibir</button>
              </form>
            </div>
            @include('components.cards')
          </div>
        @else
          @if ($radicado->fech_recive_dir != null)
            @if ($radicado->fech_recive_radic != null)
              <div  class="col-11 content-card">
                <img src="{{asset('img/check.svg')}}" alt="">
                @include('components.cards')
              </div>
            @else
              <div  class="col-11 content-card">
                @include('components.cards')
              </div>
            @endif      
          @endif
        @endif
      @else
        <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron importantes</h4></div>        
      @endif
    @endforeach
  @endif
@endif

