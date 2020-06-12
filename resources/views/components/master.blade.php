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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body id="app">

<div>
    <section class="px-8">
        <header class="container mx-auto">

            <h1 class="h1 font-bold text-lg "><a href="{{ auth()->user() ? '/tweets' : '/' }}"><img class="inline-block" src="\images\logo.png" alt="Tweety" >Tweety</a></h1>
        </header>
    </section>
    {{$slot}}
</div>
<script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
