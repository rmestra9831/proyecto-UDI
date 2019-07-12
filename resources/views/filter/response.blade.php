@if (count($query_response)>0)
  @foreach ($query_response as $radicado)
    <div  class="col-11 content-card">
      @include('components.cards')
    </div>
  @endforeach
@else
  <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron respondidos</h4></div>
@endif

@section('paginate')
<!--
  <div class="container">
    
</div>
-->
@endsection