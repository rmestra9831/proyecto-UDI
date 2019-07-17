@if (Auth::user()->type_user == 2)
  @if (count($query_entregado)>0)
    @foreach ($query_entregado as $radicado)
      <div  class="col-11 content-card">
        <img src="{{asset('img/check.svg')}}" alt="">
        @include('components.cards')
      </div>
    @endforeach
  @else
    <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron respondidos</h4></div>    
  @endif

@else
  @if (count($query_entregado_dir)>0)
    @foreach ($query_entregado_dir as $radicado)
      <div  class="col-11 content-card">
        <img src="{{asset('img/check.svg')}}" alt="">
        @include('components.cards')
      </div>
    @endforeach
  @else
    <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron respondidos</h4></div>    
  @endif
@endif