<div class="p-1">
    @if (Auth::user()->type_user == 2)
      <img class="align-items-center" src="{{ asset('icon/regctrol.svg') }}" alt="">
      @else
        @if (Auth::user()->type_user == 3)
          <img class="align-items-center" src="{{ asset('icon/direction.svg') }}" alt="">
        @else
          @if (Auth::user()->type_user == 4)
            <img class="align-items-center" src="{{ asset('icon/work.svg') }}" alt="">
          @else
            <img class="align-items-center" src="{{ asset('icon/admin.svg') }}" alt=""> 
          @endif
        @endif
     @endif
     <div class="type_user">
        @if (Auth::check())
        @if (Auth::user()->type_user == 1)
            Administrador
        @else
            @if (Auth::user()->type_user == 2)
                Admisiones y Registro
            @else
                @if (Auth::user()->type_user == 3)
                Direccion
                @else
                  @if (Auth::user()->type_user == 4)
                      Director de Programa
                  @else
                    @if (Auth::user()->type_user == 5)
                      Super Administrador
                    @endif
                  @endif                                        
                @endif                                 
            @endif
        @endif 
        @else
            <strong>Sirc UDI</strong>
        @endif
     </div>
</div>
<!--contenido de listas del panel -->
<div class="p-2">
    <div class="btn-report">
        @if (Auth::user()->type_user == 2 || Auth::user()->type_user == 3|| Auth::user()->type_user == 4)
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
        <a href="{{route('filter.viewSearchRadic')}}"><i class="fas fa-chevron-right"></i>estado de radicados
          {{-- muestra la notificación si hay radicados --}}
            <?php
              $radic = DB::table('radicados')->where([['fech_recive_radic','!=',' '],['fech_delivered',null]])->get();
              if (count($radic)) {
                ?> <strong status="" data-toggle="tooltip" data-placement="top" title="Tooltip on top" aria-hidden="true" class="fas fa-circle status-recive-dir"></strong> <?php
              }
            ?>
        </a>
          @else
            @if (Auth::user()->type_user == 3)
              <a href="{{route('direction.index')}}"><i class="fas fa-chevron-right"></i>inicio</a>
              <a href="{{route('filter.viewAllRadic')}}"><i class="fas fa-chevron-right"></i>filtrado de radicado Profile</a>
              <a href="{{route('filter.viewSearchRadicDir')}}"><i class="fas fa-chevron-right"></i>estado de radicados
                {{-- muestra la notificación si hay radicados por responder --}}
                  <?php
                    $recive_new_delegate = DB::table('radicados')->where([['delegate_id',Auth::user()->program_id],['send_temp_admin',null]])->get();
                    $radic_send_ar = DB::table('radicados')->where([['fech_recive_radic',!null],['fech_recive_radic',null],['delegate_id',Auth::user()->program_id]])->get();
                    $radic_revisar = DB::table('radicados')->where('revisar',true)->get();
                    $radic = DB::table('radicados')->where([['respuesta',null],['fech_recive_dir',!null],['delegate_id',Auth::user()->program_id]])->get();
                    if (count($radic)!=0 || count($radic_revisar) == true || count($radic_send_ar) || count($recive_new_delegate)!=0 ) {
                      ?> <strong status="" data-toggle="tooltip" data-placement="top" title="Tooltip on top" aria-hidden="true" class="fas fa-circle status-recive-dir"></strong> <?php
                    }
                  ?>
              </a>
            @else
              @if (Auth::user()->type_user == 4)
                <a href="{{route('dirprog.index')}}"><i class="fas fa-chevron-right"></i>inicio</a>
                <a href="{{route('filter.viewAllRadic')}}"><i class="fas fa-chevron-right"></i>filtrado de radicado</a>
                <a href="{{route('filter.viewSearchRadicDir_prog')}}"><i class="fas fa-chevron-right"></i>estado de radicados
                  {{-- muestra la notificación si hay radicados por responder --}}
                   <?php
                      $radic_pendiente = DB::table('radicados')->where([['send_temp_admin',null],['fech_recive_dir','!=',' '],['delegate_id',Auth::user()->program_id]])->orWhere([['send_temp_admin','!=',null],['delegate_id',Auth::user()->program_id]])->get();
                      $radic = DB::table('radicados')->where([['respuesta',null],['delegate_id',Auth::user()->program_id]])->get();
                      if (count($radic)>0 || count($radic_pendiente)>0) {
                        ?> <strong status="" data-toggle="tooltip" data-placement="top" title="Tooltip on top" aria-hidden="true" class="fas fa-circle status-recive-dir"></strong> <?php
                      }
                   ?>
                </a>  
              @else
                @if (Auth::user()->type_user == 5) {{--SUPER-ADMIN--}}
                  <a href="{{route('superAdm.index')}}"><i class="fas fa-chevron-right"></i>Inicio</a>
                  <a href="{{route('superAdm.showRadics')}}"><i class="fas fa-chevron-right"></i>radicados</a>  
                  <a href="{{route('superAdm.showUsers')}}"><i class="fas fa-chevron-right"></i>Usuarios</a>
                  <a href="{{route('superAdm.showDir')}}"><i class="fas fa-chevron-right"></i>Directores</a>
                  <a href="{{route('superAdm.showProg')}}"><i class="fas fa-chevron-right"></i>programas</a>
                  <a href="{{route('superAdm.showResetRadic')}}"><i class="fas fa-chevron-right"></i>Contadores</a>
                @else
                  <a href="{{route('admin.showRadics')}}"><i class="fas fa-chevron-right"></i>Inicio</a>
                  <a href="{{route('filter.viewAllRadic')}}"><i class="fas fa-chevron-right"></i>filtrado de radicado</a>   
                  <a href="{{route('filter.viewSearchRadicAdm')}}"><i class="fas fa-chevron-right"></i>estado de radicados
                    {{-- muestra la notificación PENDIENTES EN ADMINISTRADOR --}}
                      <?php
                        $radic_pendiente = DB::table('radicados')->where([['aproved',null],['fech_recive_dir','!=',null],['send_temp_admin','!=',null]])->get();
                        $radic = DB::table('radicados')->where([['fech_send_dir','!=',' '],['fech_recive_dir',null]])->get();
                        if (count($radic)!=0 || count($radic_pendiente)!=0) {
                          ?> <strong status="" data-toggle="tooltip" data-placement="top" title="Tooltip on top" aria-hidden="true" class="fas fa-circle status-recive-dir"></strong> <?php
                        }
                      ?>
                  </a>                  
                @endif
              @endif
            @endif
      @endif
      
    </div>
</div>
<!-- Piecera -->
<div class="p-3">
  <div class="col" id="log-panel-foot">
      <div class="btn-group dropup col name_user">
        <div class="item"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-user-circle"></i><a class="text-capitalize">{{ Auth::user()->name }}</a>
        </div>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
             {{ __('Cerrar Sesion') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </div>
    <img src="{{ asset('img/udi-brand-white.webp') }}" alt="">
  </div>
</div>

