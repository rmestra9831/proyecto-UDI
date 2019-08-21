<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="{{ asset('js/script.js') }}" defer></script>
<style>
.cont_edit_user{
    position: relative;
    height: 100% !important;
    display: flex;
}form{
    margin: auto;
    width: 90%;
}
</style>


    <div class="container cont_edit_user">
        <form action="{{action('AdminController@userEdit_ctrl', $users->id)}}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group">
                <input id="my-input" class="form-control" type="text" name="name" autocomplete="off" value=" {{$users->name}} ">
            </div>

            <div class="form-group">
                <label for="">Cargo actual:
                    <strong>
                        @foreach ($roles as $rol)
                            @if ($users->type_user == $rol->id)
                                {{$rol->name_role}}
                            @endif
                        @endforeach    
                    </strong>
                </label>
                <select name="type_user" id="" class="text-capitalize form-control form-control-sm @error('program_id') is-invalid @enderror">
                    <option class="text-capitalize" value=" {{$users->type_user}}">Cargo Actual</option>                      
                    @foreach ($roles as $rol)
                        @if ($users->type_user != 1)
                            <option class="text-capitalize" value="{{$rol->id}}">{{$rol->name_role}}</option>          
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-outline-success" type="submit">Actualizar</button>
            </div>
        </form>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>