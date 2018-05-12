<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* пока такой роут, здесь никакой логики не задейстовано.
Данный роут должен подтягивать новости из базы*/
Route::get('/news', function () {
    return view('news');
})->name('news');

/* пока такой роут, здесь никакой логики не задейстовано.
Данный роут должен подтягивать новость из базы*/
Route::get('/article', function () {
    return view('article');
})->name('article');

/* пока такой роут, здесь никакой логики не задейстовано.
Данный роут должен подтягивать события из базы*/
Route::get('/events', function () {
    return view('events');
})->name('events');

/* пока такой роут, здесь никакой логики не задейстовано.
Данный роут подтягивает событие из базы*/
Route::get('/event', function () {
    return view('event');
})->name('event');
