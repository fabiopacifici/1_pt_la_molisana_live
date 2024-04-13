<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    return view('guests.welcome');
})->name('home');

Route::get('/pasta', function () {

    $pasta = config('data.products');

    //dd($pasta);

    return view('guests.products', compact('pasta'));
})->name('products');

Route::get('/news', function () {
    //dd(config('data.posts'));

    return view('guests.news', ['posts' => config('data.posts')]);
})->name('news');



## Examples
/*Route::get('/about', function () {

    $data = [
        'name' => 'Fabio',
        'lastname' => 'Pacific'
    ];



    return view('guests.about', $data);
});
 */


/* Route::get('/contacts', function () {



    $name = 'Fabio';
    $email = "fabio@example.com";


    return view('contacts', compact('name', 'email'));
});
 */
