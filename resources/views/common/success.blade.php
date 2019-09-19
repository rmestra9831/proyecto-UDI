@if (session('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Excelente</strong>  {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  {{-- <div class="col-10 alert position-absolute d-flex sticky-top alert-success" role="alert"> --}}
    {{-- <h4 class="alert-heading"></h4> --}}
    {{-- <p>{{session('status')}}</p> --}}
    {{-- <p class="mb-0"></p> --}}
  {{-- </div> --}}
@else
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error</strong>  {{session('status')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    {{-- <div class="col-10 alert position-absolute d-flex sticky-top alert-danger" role="alert"> --}}
        {{-- <h4 class="alert-heading"></h4> --}}
      {{-- <p>{{session('error')}}</p> --}}
      {{-- <p class="mb-0"></p> --}}
    {{-- </div> --}}
  @endif
@endif
