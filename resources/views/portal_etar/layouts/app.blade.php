<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>E.T.A.R. "Diego Bautista Urbaneja"</title>  
    @include('layouts.css')
</head>
<body class="host_version">
    
    @include('portal_etar.layouts.header')
    
    @yield('content')
    
    @include('portal_etar.layouts.scripts')
</body>
</html>