@if (Auth::user()->type_user == 2)
  @if (count($query_pendiente))
    @foreach ($query_pendiente as $radicado)
      @if ($radicado->fech_notifi_end != null)
        <div  class="col-11 content-card">
          <img src="{{asset('img/waiting.svg')}}" alt="">   
          @include('components.cards')
        </div>
      @else
        <div  class="col-11 content-card">
          @include('components.cards')
        </div> 
      @endif
    @endforeach
  @else
    <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron pendientes</h4></div>    
  @endif

@else
  @if (Auth::user()->type_user == 3)
    @if (count($query_pendiente_dir))
      @foreach ($query_pendiente_dir as $radicado)
        <div  class="col-11 content-card">   
          @include('components.cards')
        </div>
      @endforeach
    @else
      <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron pendientes</h4></div>    
    @endif
  @endif
@endif