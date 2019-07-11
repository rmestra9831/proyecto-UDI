@foreach ($radicados as $radicado)
  @if ($radicado->fech_send_dir != '' && $radicado->fech_recive_dir != '' && $radicado->respuesta != '' && $radicado->fech_notifi_end != '' && $radicado->fech_delivered != '')
  <div  class="col-11 content-card">
    <img src="{{asset('img/check.svg')}}" alt="">
    @include('components.cards')
  </div>
  @endif
@endforeach