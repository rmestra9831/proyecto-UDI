@if (Auth::user()->type_user == 2 || Auth::user()->type_user == 1)
    @include('components.showExport')
@else
    @if (Auth::user()->type_user == 3 || Auth::user()->type_user == 1)
        @include('components.showExportDir')         
    @endif
@endif

