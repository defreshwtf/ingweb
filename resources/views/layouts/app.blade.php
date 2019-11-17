<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'No Name :v') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet"> --}}
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--material icons-->
    <link rel="stylesheet" type="text/css" href="css/material-icons/material-design-icons.css">
</head>
<body>
    <v-app id="app">
        <navbar-component
            :app_name="{{json_encode(config('app.name', 'No Name :v'))}}"
            :route_index="{{json_encode(url('/'))}}"
            :route_home="{{json_encode(url('/home'))}}"
            :route_login="{{json_encode(route('login'))}}"
            :route_logout="{{json_encode(route('logout'))}}"
            :route_register="{{json_encode(route('register'))}}"
            @guest
                :auth_username="{{json_encode('')}}"
            @else
                :auth_username="{{json_encode(Auth::user()->name)}}"
            @endguest
        >
        </navbar-component>
        
        <main class="py-4">
            @yield('content')
        </main>
        <footer-component></footer-component>
    </v-app>
</body>
</html>
