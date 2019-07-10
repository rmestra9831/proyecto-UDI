@if ($radicado->fech_send_dir == '')
  <i status class="fas fa-circle status-new" data-toggle="tooltip" data-placement="top" title="Nuevo Radicado"></i>
  <i status class="far fa-circle status-send" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
  <i status class="far fa-circle status-recive-dir" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
  <i status class="far fa-circle status-saw-dir" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
@else
  @if ($radicado->fech_send_dir != '')
    <i status class="fas fa-circle status-new" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
    <i status class="fas fa-circle status-send" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
      @if ($radicado->fech_recive_dir != '')
      <i status class="fas fa-circle status-recive-dir" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
        @if ($radicado->fech_recive_radic != '')
          <i status class="fas fa-circle status-saw-dir" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
        @else
          <i status class="far fa-circle status-saw-dir" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
        @endif
      @else
      <i status class="far fa-circle status-recive-dir" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
      <i status class="far fa-circle status-saw-dir" data-toggle="tooltip" data-placement="top" title="Tooltip on top"></i>
      @endif
  @else
  @endif
@endif





