<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel='preconnect' href='https://fonts.googleapis.com'>
    <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
    <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;900&display=swap' rel='stylesheet'>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
    <header>

        <img src="{{ Vite::asset('resources/images/logo.png') }}">
        <nav>
            <a href="/">Home</a>
            <a href="/products">Products</a>
            <a href="/news">News</a>

        </nav>

    </header>
    <main>
        @yield('content')
    </main>
    <footer>footer</footer>
</body>

</html>