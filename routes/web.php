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
	Route::prefix('admin')->group(function () {
  Route::get('/admin','AdminController@index')->name('admin');
    // News
    Route::any('news', 'NewsController@adminNews')->name('adminnews');/* Список всех новостей в админке*/
    Route::any('article/{id}/edit', 'NewsController@edit')->name('editnews');/* Редактирование новость*/
    Route::any('article/{id}/delete', 'NewsController@destroy')->name('deletenews');/* Удаление новости*/
    // Events
    Route::any('events', 'EventController@adminEvents')->name('adminevents');/*Список всех событий в админке*/
    Route::any('event/{id}/delete', 'EventController@destroy')->name('event.delete');/* Удаление события*/
    Route::any('event/{id}/edit', 'EventController@edit')->name('event.edit');/* Редактирование события*/ 
    // Comments confirmation
    Route::any('comments', 'CommentsController@adminComments')->name('admincomments');/*Список всех комментариев в админке*/
    Route::any('comment.confirm/{id}', 'CommentsController@commentConfirm')->name('comment.confirm');/* Одобрить комментарий*/   
    Route::any('comment/{id}/delete', 'CommentsController@deleteComment')->name('deletecomment');/* Удаление комментария*/
	Route::any('send', 'AdminController@sendMail')->name('sendMail');
	Route::any('mail', 'AdminController@mailForm')->name('mail');
});
});

//коллекция роутов для админа
Route::group(['middleware' => 'admin'], function() {
	Route::prefix('admin')->group(function () {
    // Users
    Route::any('users', 'UserController@adminUsers')->name('users'); //Список пользователей
    Route::any('profile/{id}/delete', 'UserController@destroy')->name('profile.destroy'); //Удаление пользователя
    Route::get('profile/id{id}/edit', 'UserController@edit')->name('profile.edit');/* Форма редактирования пользователя*/
    Route::post('profile/update/{id}', 'UserController@update')->name('profile.update');/* Изминение пользователя*/
    //Feedbacks
    Route::any('feedbacks', 'FeedbacksController@adminFeedbacks')->name('admin.feedback.index'); //Список заявок
    Route::any('feedback/{id}', 'FeedbacksController@show')->name('feedback.show');
    Route::any('feedback/{id}/delete', 'FeedbacksController@destroy')->name('feedback.destroy');
	Route::any('feedback/{id}/reply', 'FeedbacksController@reply')->name('feedback.reply');
    //Sliders
    Route::any('slidercreate', 'SliderController@create')->name('slider.create');
    Route::any('sliderstore', 'SliderController@store')->name('slider.store');
    Route::any('slider/{id}', 'SliderController@show')->name('slider.show');
    Route::any('slider/{id}/edit', 'SliderController@edit')->name('slider.edit');
    Route::any('slider/{id}/delete', 'SliderController@destroy')->name('slider.destroy');
    Route::any('sliders', 'SliderController@adminSliders')->name('adminSliders');
	//Reports
	Route::any('reports', 'ReportController@adminIndex')->name('adminReports');
	Route::get('reportcreate', 'ReportController@create')->name('admin.report.create');
	Route::post('reportcreate', 'ReportController@store')->name('admin.report.store');
	Route::any('report/{id}/delete', 'ReportController@destroy')->name('admin.report.destroy');
	Route::any('report/{id}/edit', 'ReportController@edit')->name('admin.report.edit');
	//News
	Route::any('newscreate', 'NewsController@create')->name('newsview');
	Route::get('eventcreate', 'EventController@create')->name('event.create');
	//Albums
	Route::get('albums','AlbumController@adminAlbums')->name('adminAlbums');
	Route::any('createalbum','AlbumController@create')->name('album.create');
	Route::any('createalbum','AlbumController@store')->name('album.create');
	Route::any('album/{id}/delete', 'AlbumController@destroy')->name('album.destroy');
	Route::any('album/{id}/edit', 'AlbumController@edit')->name('album.edit');
});
});

// News
Route::any('news', 'NewsController@index')->name('news');
Route::get('article/{id}','NewsController@article')->name('article');/* Показ одной новости*/
Route::get('usernewscreate', 'NewsController@userNewsCreate')->name('user.news.create');/*переход на добавление новости пользователем с ролью 3*/
Route::post('addNews', 'NewsController@store')->name('addNews');

// Search
Route::get('/search/results', 'IndexController@search')->name('search');
Route::get('/adminsearch/results', 'AdminController@search')->name('admin.search');
//Feedbacks
Route::any('feedback', 'FeedbacksController@index')->name('feedback');
Route::any('feedback', 'FeedbacksController@addFeedback')->name('addFeedback');
//Events
Route::any('events', 'EventController@index')->name('event.index');//Вьюха всех событий
Route::get('event/{id}','EventController@show')->name('event.show');/* Показ одного события*//* Вьюха добавления события*/
Route::get('usereventcreate', 'EventController@userEventCreate')->name('user.event.create'); /*переход на добавление события пользователем с ролью 3*/
Route::post('eventstore', 'EventController@store')->name('event.store'); /* Само добавления события*/


//Profiles
Route::group(['middleware' => 'auth'], function(){
    Route::any('profile/id{id}', 'UserController@profile')->name('profile'); //Просмотр профиля пользователя с админки
});

//Profiles
Route::any('profile/{id}/profileevents', 'UserController@profileEvents')->name('profileevents');/*пока не работает*/


//Galery
//Album
Route::any('albums','AlbumController@index')->name('album.index');
Route::get('album/{id}', 'AlbumController@show')->name('album.show');
Route::get('useralbumscreate', 'AlbumController@userCreate')->name('album.user.create');

//Image
Route::post('addimage','ImageController@imageAdd')->name('add_image_to_album');
Route::get('image/{id}/delete','ImageController@deleteImage')->name('deleteImage');
Route::get('addimage/{id}','ImageController@getForm')->name('add_image');

//Report
Route::get('reports', 'ReportController@index')->name('reports');
Route::get('report/{id}','ReportController@show')->name('report.show');/* Показ одного отчета*/
Route::get('createreport', 'ReportController@userReportCreate')->name('user.reports.create'); /*переход на добавление новости пользователем с ролью 3*/
Route::post('addreport', 'ReportController@store')->name('addreport');



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