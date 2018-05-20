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

//коллекция роутов для главы (убираем пользователей)
Route::group(['middleware' => 'adminandchief'], function() {    
    Route::get('/admin', function () {
        return view('admin/admin');
    })->name('admin');
    // News
    Route::any('adminnews', 'NewsController@adminNews')->name('adminnews');/* Список всех новостей в админке*/
    Route::any('editnews/{id}', 'NewsController@editNews')->name('editnews');/* Редактирование новость*/
    Route::any('deletenews/{id}', 'NewsController@deleteNews')->name('deletenews');/* Удаление новости*/
    // Events
    Route::any('adminevents', 'EventController@adminEvents')->name('adminevents');/*Список всех событий в админке*/
    Route::any('event/{id}/delete', 'EventController@destroy')->name('event.delete');/* Удаление события*/
    Route::any('event/{id}/edit', 'EventController@edit')->name('event.edit');/* Редактирование события*/    
});

//коллекция роутов для админа
Route::group(['middleware' => 'admin'], function() {
    // Users
    Route::any('users', 'UserController@adminUsers')->name('users'); //Список пользователей
    
    Route::any('profile/{id}/delete', 'UserController@destroy')->name('profile.destroy'); //Удаление пользователя
    Route::any('profile/id{id}/edit', 'UserController@edit')->name('profile.edit');/* Редактирование пользователя*/
    //Feedbacks
    Route::any('adminfeedbacks', 'FeedbacksController@adminFeedbacks')->name('adminfeedbacks'); //Список заявок
    Route::any('adminonefeedback/{id}', 'FeedbacksController@adminFeedbacksShowOne')->name('adminonefeedback');
    Route::any('feedback/{id}/delete', 'FeedbacksController@deleteFeedback')->name('deletefeedback');
    //Sliders
    Route::any('slidercreate', 'SliderController@create')->name('slider.create');
    Route::any('sliderstore', 'SliderController@store')->name('slider.store');
    Route::any('slider/{id}', 'SliderController@show')->name('slider.show');
    Route::any('slider/{id}/edit', 'SliderController@edit')->name('slider.edit');
    Route::any('slider/{id}/delete', 'SliderController@destroy')->name('slider.destroy');
    Route::any('adminsliders', 'SliderController@adminSliders')->name('adminSliders');
});


// News
Route::any('news', 'NewsController@newsPage')->name('news');
Route::get('newsview', 'NewsController@newsView')->name('newsview');
Route::post('addNews', 'NewsController@addNews')->name('addNews');
Route::get('article/{id}','NewsController@article')->name('article');/* Показ одной новости*/

// Search
Route::get('/search/results', 'SearchController@search')->name('search');

//Feedbacks
Route::any('feedback', 'FeedbacksController@index')->name('feedback');
Route::any('feedback', 'FeedbacksController@addFeedback')->name('addFeedback');

//Events
Route::any('events', 'EventController@index')->name('event.index');//Вьюха всех событий
Route::get('event/{id}','EventController@show')->name('event.show');/* Показ одного события*/
Route::get('eventcreate', 'EventController@create')->name('event.create');/* Вьюха добавления события*/
Route::post('eventstore', 'EventController@store')->name('event.store'); /* Само добавления события*/


//Profiles
Route::group(['middleware' => 'auth'], function(){
    Route::any('profile/id{id}', 'UserController@profile')->name('profile'); //Просмотр профиля пользователя с админки
});


//Profiles
Route::any('profile/{id}/profileevents', 'UserController@profileEvents')->name('profileevents');/*пока не работает*/


//Galery
Route::get('/addimage/{id}','ImageController@getForm')->name('add_image');
Route::post('/addimage','ImageController@imageAdd')->name('add_image_to_album');
Route::get('/deleteimage/{id}','ImageController@deleteImage')->name('deleteImage');
Route::any('albums','AlbumController@getlist')->name('getlist');
Route::any('createalbum','AlbumController@getForm')->name('getform');
Route::any('createalbum','AlbumController@albumCreate')->name('albumcreate');
Route::any('album/{id}', 'AlbumController@getAlbum')->name('onealbum');
Route::any('deletelbum/{id}', 'AlbumController@deleteAlbum')->name('deleteAlbum');

//Report
Route::get('report', 'ReportController@getReport')->name('report');
Route::any('reportform', 'ReportController@reportForm')->name('reportform');
Route::any('makereport', 'ReportController@makeReport')->name('makereport');
Route::get('delete/{id}', 'ReportController@deleteLineReport')->name('delete');
Route::any('updateform/{id}', 'ReportController@updateForm')->name('updateform');
Route::any('update/{id}', 'ReportController@updateLineReport')->name('update');
 

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
Route::any('deletecomment/{id}', 'CommentsController@deleteComment')->name('deleteComment');


Route::get('/admin/students-classes', 'StudentClassController@index')->name('studentsClasses');
Route::post('/admin/students-classes/create', 'StudentClassController@store')->name('storeStudentsClasses');
Route::post('/admin/students-classes/update', 'StudentClassController@update')->name('updateStudentsClasses');
Route::get('/admin/students-classes/delete/{id}', 'StudentClassController@destroy')->name('destroyStudentsClasses');


//ajax
Route::get('/ajax', 'Ajax\StudentClassController@getClasses')->name('getStudentClasses');