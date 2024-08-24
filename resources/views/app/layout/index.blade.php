@php
function isActive($route)
{
    return $route === \Illuminate\Support\Facades\Route::currentRouteName();
}
@endphp

@include('app.layout.header')
@yield('content')
@include('app.layout.footer')
