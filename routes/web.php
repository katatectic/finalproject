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
Route::get('/news', 'NewsController@getNews')->name('news');

/* пока такой роут, здесь никакой логики не задейстовано.
Данный роут должен подтягивать новость из базы*/
Route::get('/article/{$id}', 'NewsController@getArticle')->name('article');

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

/* пока такой роут, здесь никакой логики не задейстовано.
Данный роут подтягивает перечень комитетов школы из базы*/
Route::get('/about', function () {
    return view('about');
})->name('about');

/* пока такой роут, здесь никакой логики не задейстовано.
Данный роут просто содержит контакты*/
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

/* пока такой роут, здесь никакой логики не задейстовано.
Данный роут подтягивает информацию о конкретном комитете класса из базы*/
Route::get('/committee', function () {
    return view('committee');
})->name('committee');
