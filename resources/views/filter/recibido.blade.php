@if (Auth::user()->type_user == 2)
  @if (count($query_recive)>0)
    @foreach ($query_recive as $radicado)
      <div  class="col-11 content-card">
        @include('components.cards')
      </div>
    @endforeach
  @else
    <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron recibidos</h4></div>
  @endif

@else
  @if (Auth::user()->type_user == 3)
    @if (count($query_recive_dir) > 0)
      @foreach ($query_recive_dir as $radicado)    
        @if(Auth::user()->PermissionAdmin == 1)
          @if ($radicado->fech_recive_radic == '')
              @if ($radicado->fech_recive_dir == '')
                <div class="col-11 content-card">
                  <!--ventada de recivido-->
                   <div class="unrecive" id="{{$radicado->id}}" valid="{{$radicado->id}}">
                     <!-- formulario para actualizar el estado de recivido direccion-->
                     <form action="{{route('status.update',$radicado->slug)}}" method="post">
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
                {{-- aqui se pone la imagen del estado de revisar y aprovado --}}
                 <div class="col-11 content-card">
                    @if ($radicado->revisar == 1)
                     <img src="{{asset('img/warning.svg')}}" alt="">
                    @else
                      @if ($radicado->aproved == 0)
                        <img src="{{asset('img/waiting.svg')}}" alt="">
                      @endif
                    @endif
                    @include('components.cards')
                  </div>
              @endif             
          @else
              <div class="col-11 content-card">
                <img src="{{asset('img/check.svg')}}" alt="">
                @include('components.cards')
              </div>
          @endif
        @else
          {{-- esto se muestra siempre y cuando el admnistrador halla recibido el radicado --}}
          @if ($radicado->fech_recive_dir != '')
            <div class="col-11 content-card">
              @if ($radicado->revisar == 1)
               <img src="{{asset('img/warning.svg')}}" alt="">
              @else
                @if ($radicado->aproved == 0)
                  <img src="{{asset('img/waiting.svg')}}" alt="">
                @endif
              @endif
              @include('components.cards')
            </div>
          @endif
        @endif
      @endforeach
    @else
      <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron recibidos</h4></div>
    @endif
  
  @else
    @if (Auth::user()->type_user == 4)
    
      @if (count($query_recive_dir) > 0)
          @foreach ($query_recive_dir as $radicado)
            <div  class="col-11 content-card">
              @include('components.cards')
            </div>
          @endforeach
      
      @else
        <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron recibidos</h4></div>
      @endif

    @endif
  @endif
@endif

