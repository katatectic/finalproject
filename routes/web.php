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
Route::get('newsview', 'NewsController@newsView')->name('newsview');
Route::post('addNews', 'NewsController@addNews')->name('addNews');
/* пока такой роут, здесь никакой логики не задейстовано.
Данный роут должен подтягивать новость из базы*/
Route::get('/article', function () {
    return view('article');
})->name('article');



Route::get('events', 'EventController@eventsPage')->name('events');/* Показ всех событий*/
Route::get('event/{id}','EventController@oneEvent')->name('event');/* Показ одного события*/
 Route::get('eventview', 'EventController@eventView')->name('eventview');/* Вьюха добавления события*/
Route::post('addEvent', 'EventController@addEvent')->name('addEvent'); /* Само добавления события*/
Route::any('adminevents', 'EventController@adminEvents')->name('adminevents');/* Список всех событий в админке*/
Route::any('deleteevent/{id}', 'EventController@deleteEvent')->name('deleteevent');/* Удаление события*/
Route::any('editevent/{id}', 'EventController@editEvent')->name('editevent');/* Редактирование события*/

 
        Route::any('users', 'UserController@adminUsers')->name('users'); //Список пользователей
        Route::any('adminshowuser/{id}', 'UserController@adminUsersShowOne')->name('adminshowuser'); //Просмотр профиля пользователя с админки
        Route::any('deleteuser/{id}', 'UserController@deleteUser')->name('deleteuser'); //Удаление пользователя
		Route::any('edituser/{id}', 'UserController@editUser')->name('edituser');/* Редактирование пользователя*/
 
 
 
 
 
 
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

/*
Добавление комментария к статье, событию и отчету
*/
Route::post('/add_comment', 'CommentsController@addComment')->name('add_comment');

Route::get('/admin/students-classes', 'StudentClassController@index')->name('studentsClasses');
Route::post('/admin/students-classes/create', 'StudentClassController@store')->name('storeStudentsClasses');
Route::post('/admin/students-classes/update', 'StudentClassController@update')->name('updateStudentsClasses');
Route::get('/admin/students-classes/delete/{id}', 'StudentClassController@destroy')->name('destroyStudentsClasses');