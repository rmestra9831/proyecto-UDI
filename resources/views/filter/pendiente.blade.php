@if (count($query_pendiente))
  @foreach ($query_pendiente as $radicado)
    <div  class="col-11 content-card">
      <img src="{{asset('img/waiting.svg')}}" alt="">   
      @include('components.cards')
    </div>
  @endforeach
@else
  <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron pendientes</h4></div>    
@endif