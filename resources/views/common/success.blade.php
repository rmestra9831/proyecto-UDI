@if (session('status'))
  <div class="col-10 alert position-absolute d-flex sticky-top alert-success" role="alert">
    <h4 class="alert-heading"></h4>
  <p>{{session('status')}}</p>
    <p class="mb-0"></p>
  </div>
@else
  @if (session('error'))
    <div class="col-10 alert position-absolute d-flex sticky-top alert-danger" role="alert">
        <h4 class="alert-heading"></h4>
      <p>{{session('error')}}</p>
      <p class="mb-0"></p>
    </div>
  @endif
@endif
