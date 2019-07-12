@if (count($query_norm)>0)
  @foreach ($query_norm as $radicado)
    <div  class="col-11 content-card">
      @include('components.cards')
    </div>
  @endforeach
@else
  <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron Normales</h4></div>
@endif

<div class="container">
   
</div>
@section('paginate-nor')
@endsection