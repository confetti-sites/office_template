@php
    $isAdmin = str_starts_with(request()->uri(), '/admin');

@endphp

@if($isAdmin)
    @include('admin.index')
@else
    @include('view.homepage')
@endif
