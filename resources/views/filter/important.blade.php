@if (count($query_important))
  @foreach ($query_important as $radicado)
    <div  class="col-11 content-card">
      @include('components.cards')
    </div>
  @endforeach
@else
  <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron importantes</h4></div>        
@endif