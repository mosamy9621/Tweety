<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body id="app">

<div>
   <section class="px-8">
    <header class="container mx-auto">

        <h1 class="h1 font-bold text-lg "><img class="inline-block" src="\images\logo.png" alt="Tweety" >Tweety</h1>
</header>
   </section>
    <section class="px-8"><main class="container mx-auto py-4">
            <div class="lg:flex lg:flex-no-wrap  lg:justify-between ">
                @if(auth()->check())
                <div class="w-1/32">@include('_sidebar-links')</div>
                @endif

                <div class="lg:flex-1 lg:mx-4 max-w-3xl">
                @yield('content')
                </div>
                    @if(auth()->check())
                    <div  class="w-1/6  bg-blue-100 min-h-0  rounded-b-lg p-4 " style="align-self: flex-start" >@include('_friends-list')</div>
                    @endif

            </div>
        </main></section>
</div>

</body>
</html>
