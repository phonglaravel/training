<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   @include('layouts.style')
   @stack('styles')
</head>
<body>
    <div id="app">
        @include('layouts.nav')       
            @yield('content')
    </div>
   @include('layouts.script')
   @stack('scripts')
   
</body>
</html>
