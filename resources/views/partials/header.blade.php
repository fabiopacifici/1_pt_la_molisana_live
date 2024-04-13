<header>

    <img src="{{ Vite::asset('resources/images/logo.png') }}">
    <nav>
        <a href="{{route('home')}}" class="{{ Route::currentRouteName() === 'home' ? 'active' :'' }}">Home</a>
        <a href="{{route('products')}}" class="{{ Route::currentRouteName() === 'products' ? 'active' :'' }}">Products</a>
        <a href="{{route('news')}}" class="{{ Route::currentRouteName() === 'news' ? 'active' :'' }}">News</a>
    </nav>

</header>