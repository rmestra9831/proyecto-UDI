@if (Auth::user()->type_user == 2)
    @include('components.showExport')
@else
    @if (Auth::user()->type_user == 3)
        @include('components.showExportDir')         
    @endif
@endif

