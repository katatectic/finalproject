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
Route::any('news', 'NewsController@newsPage')->name('news');
Route::any('adminnews', 'NewsController@adminNews')->name('adminnews');/* Список всех новостей в админке*/
Route::get('newsview', 'NewsController@newsView')->name('newsview');
Route::post('addNews', 'NewsController@addNews')->name('addNews');
Route::any('editnews/{id}', 'NewsController@editNews')->name('editnews');/* Редактирование новость*/
Route::any('deletenews/{id}', 'NewsController@deleteNews')->name('deletenews');/* Удаление новости*/
Route::get('article/{id}','NewsController@article')->name('article');/* Показ одной новости*/


Route::any('adminfeedbacks', 'FeedbacksController@adminFeedbacks')->name('adminfeedbacks'); //Список заявок
        Route::any('adminonefeedback/{id}', 'FeedbacksController@adminFeedbacksShowOne')->name('adminonefeedback');
 Route::any('feedback', 'FeedbacksController@index')->name('feedback');
Route::any('feedback', 'FeedbacksController@addFeedback')->name('addFeedback');
Route::any('deletefeedback/{id}', 'FeedbacksController@deleteFeedback')->name('deletefeedback');

Route::any('events', 'EventController@eventsPage')->name('events');
Route::get('event/{id}','EventController@oneEvent')->name('event');/* Показ одного события*/
 Route::get('eventview', 'EventController@eventView')->name('eventview');/* Вьюха добавления события*/
Route::post('addEvent', 'EventController@addEvent')->name('addEvent'); /* Само добавления события*/
Route::any('adminevents', 'EventController@adminEvents')->name('adminevents');/* Список всех событий в админке*/
Route::any('deleteevent/{id}', 'EventController@deleteEvent')->name('deleteevent');/* Удаление события*/
Route::any('editevent/{id}', 'EventController@editEvent')->name('editevent');/* Редактирование события*/

 
        Route::any('users', 'UserController@adminUsers')->name('users'); //Список пользователей
        Route::any('profile/id{id}', 'UserController@profile')->name('profile'); //Просмотр профиля пользователя с админки
        Route::any('deleteuser/{id}', 'UserController@deleteUser')->name('deleteuser'); //Удаление пользователя
		Route::any('edituser/id{id}', 'UserController@editUser')->name('edituser');/* Редактирование пользователя*/
		

	Route::any('profile/{id}/profileevents', 'UserController@profileEvents')->name('profileevents');
 

 
 
 Route::any('slider', 'SliderController@addView')->name('slider');
 Route::any('addslider', 'SliderController@addSlider')->name('addSlider');
 Route::any('adminsliders', 'SliderController@adminSliders')->name('adminSliders');
 Route::any('adminoneslider/{id}', 'SliderController@adminOneSlider')->name('adminOneSlider');
 Route::any('deleteslider/{id}', 'SliderController@deleteSlider')->name('deleteSlider');
 Route::any('editslider/{id}', 'SliderController@editSlider')->name('editSlider');
 
 
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

//admin
//Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function() {
//	Route::get('/', function () { return view('admin');})->name('admin');
//Route::any('deleteevent/{id}', 'EventController@deleteEvent')->name('deleteevent');/* Удаление события*/
//Route::any('editevent/{id}', 'EventController@editEvent')->name('editevent');/* Редактирование события*/
	// events
/* Редактирование события*/

    // Route::get('/', 'Admin\AccountController@action')->name('admin');
    // // Articles
    // Route::get('/articles_edit', 'Admin\ArticlesController@getPosts')->name('articles_edit');
    // Route::get('/article_del/{id}','Admin\ArticlesController@deleteArticle')->name('article_del');
    // Route::get('/article_publ/{id}','Admin\ArticlesController@publArticle')->name('article_publ');

    // // Users
    // Route::get('/users_edit', 'Admin\UsersController@getUsers')->name('users_edit');
    // Route::get('/user_del/{id}','Admin\UsersController@deleteUser')->name('user_del');
//});



//ajax
Route::get('/ajax', 'Ajax\StudentClassController@getClasses')->name('getStudentClasses');