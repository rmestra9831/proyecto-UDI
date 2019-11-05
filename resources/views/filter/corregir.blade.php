@if (count($query_corregir_dir)>0)
  @foreach ($query_corregir_dir as $radicado)
  
    <div  class="col-11 content-card">
        <img src="{{asset('img/warning.svg')}}" alt="">
        @include('components.cards')
    </div>
  @endforeach
@else
  <div class="content-card" style="width: 50%"><h4 style="margin: 0; text-align: center">No se encontraron enviados</h4></div>
@endif

<div class="container">
    
</div>
@section('paginate-env')


@endsection