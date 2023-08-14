<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>InvLicancabur! | @yield('title')</title>
    @include('layouts.css')
</head>
<body class="app sidebar-mini rtl">
    @include('layouts.header')
    @include('layouts.sidebar')
    
    @yield('content')
    
    @include('layouts.scripts')
</body>
</html>
