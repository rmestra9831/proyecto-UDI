@foreach ($radicados as $radicado)
  @if ($radicado->atention == 'urgente')
  <div  class="col-11 content-card">
    @include('components.cards')
  </div>
  @endif
@endforeach