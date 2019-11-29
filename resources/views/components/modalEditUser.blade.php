<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{$user->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title m-auto" style="border: none" id="staticBackdropLabel">Editar usuario {{$user->name}} </h3>
      </div>
      <div class="modal-body">
        <form id="editUserForm" action="{{action('SuperadmController@userEdit_ctrl', $user->id)}}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group">
                <input id="my-input" class="form-control" type="text" name="name" autocomplete="off" value=" {{$user->name}} ">
            </div>

            <div class="form-group">
                <label for="">Cargo actual:
                    <strong>
                        @foreach ($roles as $rol)
                            @if ($user->type_user == $rol->id)
                                {{$rol->name_role}}
                            @endif
                        @endforeach    
                    </strong>
                </label>
                <select name="type_user" id="" class="text-capitalize form-control @error('program_id') is-invalid @enderror">
                    <option class="text-capitalize" value=" {{$user->type_user}}">Cargo Actual</option>                      
                    @foreach ($roles as $rol)
                        @if ($user->type_user != 5)
                            <option class="text-capitalize" value="{{$rol->id}}">{{$rol->name_role}}</option>          
                        @endif
                    @endforeach
                </select>
            </div>
        <button id="editUserForm" type="submit" class="btn btn-primary">Understood</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>