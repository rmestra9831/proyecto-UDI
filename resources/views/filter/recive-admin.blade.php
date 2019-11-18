@if (count($query_recividos_admin)>0)
  @foreach ($query_recividos_admin as $radicado)
  <div  class="col-11 content-card">
    @if ($radicado->fech_recive_dir == null)
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
    @else
        <img src="{{asset('img/waiting.svg')}}" alt="">
    @endif
    @include('components.cards')
</div>
  @endforeach
@else
  <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron aprovados</h4></div>
@endif

<div class="container">
    
</div>
@section('paginate-env')

@endsection