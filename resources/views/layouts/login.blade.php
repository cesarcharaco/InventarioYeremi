<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>SAYER! | @yield('title')</title>
    @include('layouts.css')
    @yield('css')
</head>
<body>
    @yield('content')
    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>
