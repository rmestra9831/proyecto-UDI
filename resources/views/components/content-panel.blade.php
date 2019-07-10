@if (Auth::user()->type_user == 2)
    @include('regctrol.content')
  @else
  @if (Auth::user()->type_user == 3)
      hola dir
  @endif
@endif