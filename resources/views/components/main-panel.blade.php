<div class="p-1">
    @if (Auth::user()->type_user == 2)
      <img class="align-items-center" src="{{ asset('icon/regctrol.svg') }}" alt="">
      @else
        @if (Auth::user()->type_user == 3)
          <img class="align-items-center" src="{{ asset('icon/direction.svg') }}" alt="">
        @else
          <img class="align-items-center" src="{{ asset('icon/admin.svg') }}" alt="">
        @endif
     @endif
</div>
<!--contenido de listas del panel -->
<div class="p-2">
    <div class="btn-report">
        @if (Auth::user()->type_user == 2 || Auth::user()->type_user == 3)
          <a name="" id="" class="btn btn-report btn-block btn-outline-light text-capitalize" href="{{route('Report.index')}}" role="button">reportes</a>
        @else
          <a style="margin: 0;" name="" id="" class="btn btn-report btn-block btn-outline-light text-capitalize" href="{{route('Report.indexAR')}}" role="button">reportes de AR</a>
          <a name="" id="" class="btn btn-report btn-block btn-outline-light text-capitalize" href="{{route('Report.indexDir')}}" role="button">reportes Dirección</a>
        @endif
    </div>
    <div class="p-item-list text-capitalize">
      @if (Auth::user()->type_user == 2)
        <a href="{{route('reg-ctrol.index')}}"><i class="fas fa-chevron-right"></i>Inicio</a>
        <a href="{{route('reg-ctrol.create')}}"><i class="fas fa-chevron-right"></i>nuevo radicado</a>
        <a href="{{route('filter.viewAllRadic')}}"><i class="fas fa-chevron-right"></i>filtrado de radicado</a>
        <a href="{{route('filter.viewSearchRadic')}}"><i class="fas fa-chevron-right"></i>estado de radicados</a>
          @else
          @if (Auth::user()->type_user == 3)
            <a href="{{route('direction.index')}}"><i class="fas fa-chevron-right"></i>inicio</a>
            <a href="{{route('filter.viewAllRadic')}}"><i class="fas fa-chevron-right"></i>filtrado de radicado</a>
            <a href="{{route('filter.viewSearchRadicDir')}}"><i class="fas fa-chevron-right"></i>estado de radicados</a>
            @else
              <a href="{{route('admin.index')}}"><i class="fas fa-chevron-right"></i>Inicio</a>
              <a href="{{route('admin.showUsers')}}"><i class="fas fa-chevron-right"></i>Usuarios</a>
              <a href="{{route('admin.showUsers')}}"><i class="fas fa-chevron-right"></i>Directores</a>
              <a href="{{route('admin.showUsers')}}"><i class="fas fa-chevron-right"></i>programas</a>
              <a href="{{route('filter.viewAllRadic')}}"><i class="fas fa-chevron-right"></i>filtrado de radicado</a>   
            @endif
      @endif
    </div>
</div>

