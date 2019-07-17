@if (Auth::user()->type_user == 2))
  @if (count($query_response)>0)
    @foreach ($query_response as $radicado)
      <div  class="col-11 content-card">
        @include('components.cards')
      </div>
    @endforeach
  @else
    <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron respondidos</h4></div>
  @endif
@else
  @if (Auth::user()->type_user == 3)
    @if (count($query_response_dir)>0)
      @foreach ($query_response_dir as $radicado)
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
      @endforeach
    @else
      <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron respondidos</h4></div>
    @endif
  @endif
@endif

