@if ($errors->any())
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="alert-heading">Ten cuidado!</h4>
        <p>Algunos campos para agregar el radicado no estan bien o no pusiste datos en ellos. Rectifica estos campos:</p>
        <hr>
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif