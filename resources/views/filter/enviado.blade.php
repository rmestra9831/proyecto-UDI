@foreach ($radicados as $radicado)
  @if ($radicado->fech_send_dir != '' && $radicado->fech_recive_dir == null && $radicado->fech_notifi_end == null && $radicado->fech_delivered == null )
  <div  class="col-11 content-card">
    @include('components.cards')
  </div>
  @endif
@endforeach