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

    @include('common.success')

    <div class="container cont_edit_user">
        <form action="{{action('AdminController@dirgEdit_ctrl', $programas->id)}}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group">
                    <label for="">Nombre del director</label>
                <input id="my-input" class="form-control" type="text" name="name_dir" autocomplete="off" value=" {{$programas->name_dir}} ">
            </div>
            <!-- actualziar correo -->

            <div class="form-group">
                <button class="btn btn-block btn-outline-success" type="submit">Actualizar</button>
            </div>
        </form>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ asset('js/script.js') }}" defer></script>
<script src="/js/datas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

