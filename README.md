# Step by Step

## Install laravel

```bash

composer create-project laravel/laravel:^10.0 my-example-app
cd my-example-app

```

Install the dependencies for the fronend

```bash

npm i
```

## Setup

Rename the welcome route if needed

```php
Route::get('/', function () {
    return view('home');
});

```

if the route has changed you need to update the view accordingly

inside the resources/view/ and rename the `welcome.blade.php` in `home.blade.php`

```bash

cd resources/views
# rename the file
mv welcome.blade.php home.blade.php

```

## Define a layout file

Take the welcome's view content and create with it a app.blade.php file inside the layouts/ folder

```bash
cd resources/views
mkdir layouts
cp welcome.blade.php layouts/app.blade.php

```

Open the file with VScode and update the content as follows

```php

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- 👇 This is required to import frontend assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">


    <header>Header</header>
    <main>
        <!-- 👇 This is a placeholder that allows to add dinamic contents to the page -->
        @yield('content')
    </main>
    <footer>Footer</footer>
</body>

</html>
```

### Create partials for header and footer

Create a partials folder where put all layout and other partials

```bash
cd resources/views
mkdir partials
cd partials
touch header.blade.php
touch footer.blade.php

```

update this using the blade @include directive

```php
<body class="antialiased">


    <header>Header</header>
    <main>
        <!-- 👇 This is a placeholder that allows to add dinamic contents to the page -->
        @yield('content')
    </main>
    <footer>Footer</footer>
</body>

```

The code above will become as follow

```php

<body class="antialiased">


    @include('partials.header')
    <main>
        <!-- 👇 This is a placeholder that allows to add dinamic contents to the page -->
        @yield('content')
    </main>
    @include('partials.footer')

</body>
```

Put inside the partials the header and footer tags

```php

// partials/header.blade.php
 <header>Header</header>
```

```php

// partials/footer.blade.php
  <footer>Footer</footer>

```

## Extend the layout in the all pages

```php

// home.blade.php

@extends('layouts.app')

@section('content')

<h1>Home Page</h1>

@endsection
```

### Add other pages

To add other pages we create new routes inside web.php just below the home route

```php

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

```

Next we need to create the corresponding view

### create the new view for the about route

```
cd resources/views
touch about.blade.php

```

Now you can use the layout we created earlier and extend it inside the new view file.

```php

// about.blade.php

@extends('layouts.app')

@section('content')

<h1>About Page</h1>

@endsection

```

## Pass the data to a view

Pass a posts variable to the view using compact (option 1) or a data array (option 2)

```php
    // option 1
Route::get('/', function () {


    $posts = array(
        array('id' => 1, 'title' => 'Post 1', 'content' => 'This is the first post.'),
        array('id' => 2, 'title' => 'Post 2', 'content' => 'This is the second post.'),
        array('id' => 3, 'title' => 'Post 3', 'content' => 'This is the third post.')
    );

    return view('home', compact('posts'));
});


    // option 2
Route::get('/', function () {


    $data = [
        'posts' => [ 
            array('id' => 1, 'title' => 'Post 1', 'content' => 'This is the first post.'),
            array('id' => 2, 'title' => 'Post 2', 'content' => 'This is the second post.'),
            array('id' => 3, 'title' => 'Post 3', 'content' => 'This is the third post.')
        ]

    ];


    return view('home', $data);
});


```

### print the data in a view

use a blade foreach directive to print the posts data

```php

@foreach($posts as $post)

<div>
    {{$post['title']}}
</div>
@endforeach
```

### Use config helper function

to organize our codebase we use a laravel helper function called `config` that will points and return the data inside the `config/` folder

```bash
cd config
touch posts.php

```

Inside the config/posts.php file add the data as follow using the same structure

```php

return [

    "posts" => array(
        array('id' => 1, 'title' => 'Post 1', 'content' => 'This is the first post.'),
        array('id' => 2, 'title' => 'Post 2', 'content' => 'This is the second post.'),
        array('id' => 3, 'title' => 'Post 3', 'content' => 'This is the third post.')
    ),

    // you can add other `key => value` pairs here

];

```

Use the config function to get the data. You can update the code below as follow

```php
Route::get('/', function () {


    /* $posts = array(
        array('id' => 1, 'title' => 'Post 1', 'content' => 'This is the first post.'),
        array('id' => 2, 'title' => 'Post 2', 'content' => 'This is the second post.'),
        array('id' => 3, 'title' => 'Post 3', 'content' => 'This is the third post.')
    );
 */
    // config(filename.key)
    $posts = config('posts.posts')
    return view('home', compact('posts'));
});


```
