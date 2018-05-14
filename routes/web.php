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

Route::get('/', 'IndexController@getMain')->name('main');

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


/* Показ всех событий*/
Route::get('events', 'EventController@eventsPage')->name('events');
/* Показ одного события*/
Route::get('event/{id}','EventController@oneEvent')->name('event');
/* Вьюха добавления события*/
 Route::get('eventview', 'AdminEventController@eventView')->name('eventview');
Route::post('addEvent', 'AdminEventController@addEvent')->name('addEvent');
 
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

Route::group(['middleware' => ['role:1']], function () {

});
Route::group(['middleware' => ['role:2']], function () {

});
Route::group(['middleware' => ['role:3']], function () {

});