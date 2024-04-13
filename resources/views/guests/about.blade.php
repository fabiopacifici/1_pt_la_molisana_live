<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel About</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<?php

$age = 44;
?>

@php

$age = 44

@endphp

<body class="antialiased">
    <h1>About: {{$name}} {{$lastname}}</h1>


    <img src="/logo.png" alt="">
    <img src="{{ Vite::asset('resources/images/logo.png') }}">

</body>

</html>