<table class="table table-striped hover table-datas" id="radicados" class="display">
        <thead>
            <tr>
                <th>Sede</th>
                <th>Cantidad de radicados</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sedes as $sede)
                <tr>
                    <td class="text-capitalize">{{$sede->name}} </td>
                    <td>
                        @if ($sede->cont_radic > 0)
                            {{$sede->cont_radic}}
                            @else
                            Sin Radicados
                        @endif
                    </td>
                    <td>
                         <form action="{{action('SuperadmController@resetRadic', $sede->id)}}" method="post">
                            @method('PUT')
                            @csrf
                            <button class="btn btn-block btn-outline-success" type="submit">Resetear contador</button>
                          
                        </form>
                    </td>                    
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
    