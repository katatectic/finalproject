<?php

Route::get('/', 'IndexController@getMain')->name('main');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// News, article
Route::get('news', 'NewsController@index')->name('news');
Route::get('article/{id}','NewsController@article')->name('article');
Route::post('choose_news', 'NewsController@chooseNews')->name('article.choose');

// Events, event
Route::get('events', 'EventController@index')->name('event.index'); 
Route::get('event/{id}', 'EventController@show')->name('event.show'); 
Route::post('choose_events', 'EventController@chooseEvents')->name('event.choose');

//Report
Route::get('reports', 'ReportController@index')->name('reports');
Route::get('report/{id}', 'ReportController@show')->name('report.show');
Route::post('choose_reports', 'ReportController@chooseReports')->name('report.choose');
Route::get('add_check/{id}', 'CheckController@create')->name('check.create');
Route::post('add_check', 'CheckController@store')->name('check.store');
Route::get('check/{id}/delete', 'CheckController@deleteCheck')->name('check.delete');


// Search
Route::get('/search/results', 'IndexController@search')->name('search');

//Feedbacks
Route::get('feedback', 'FeedbacksController@index')->name('feedback');
Route::post('feedback', 'FeedbacksController@addFeedback')->name('addFeedback');

//Galery
//Album
Route::get('albums', 'AlbumController@index')->name('album.index');
Route::get('album/{id}', 'AlbumController@show')->name('album.show');

//ajax
Route::get('/ajax', 'Ajax\StudentClassController@getClasses')->name('getStudentClasses');

//коллекция роутов для главы комитета и админа
Route::group(['prefix' => 'admin', 'middleware' => 'adminandchief'], function() {
    Route::get('/admin', 'AdminController@index')->name('admin');
    // News
    Route::get('news', 'NewsController@adminNews')->name('adminnews');
	Route::post('choose_admin_news', 'NewsController@chooseAdminNews')->name('article.admin.choose');
    Route::get('newscreate', 'NewsController@create')->name('newsview');
    Route::post('addNews', 'NewsController@adminNewsStore')->name('admin.addNews');
    Route::get('article/{id}/edit', 'NewsController@edit')->name('article.edit');/* Редактирование новость*/
    Route::post('article/{id}/update', 'NewsController@update')->name('article.update');/* Редактирование новость*/
    Route::get('article/{id}/delete', 'NewsController@destroy')->name('deletenews');/* Удаление новости*/
    // Events
    Route::get('events', 'EventController@adminEvents')->name('adminevents'); /* Список всех событий в админке */
	Route::post('choose_admin_events', 'EventController@chooseAdminEvents')->name('event.admin.choose');
    Route::get('eventcreate', 'EventController@create')->name('event.create');
    Route::post('eventstore', 'EventController@adminEventStore')->name('admin.event.store');
    Route::get('event/{id}/delete', 'EventController@destroy')->name('event.delete'); /* Удаление события */
    Route::get('event/{id}/edit', 'EventController@edit')->name('event.edit'); /* Редактирование события */
    Route::post('event/{id}/update', 'EventController@update')->name('event.update'); /* Редактирование события */
    //Reports
    Route::get('reports', 'ReportController@adminIndex')->name('adminReports');
	Route::post('choose_admin_reports', 'ReportController@chooseAdminReports')->name('admin.report.choose');
    Route::get('reportcreate', 'ReportController@create')->name('admin.report.create');
    Route::post('reportcreate', 'ReportController@store')->name('admin.report.store');
    Route::get('report/{id}/delete', 'ReportController@destroy')->name('admin.report.destroy');
    Route::get('report/{id}/edit', 'ReportController@edit')->name('admin.report.edit');
    Route::post('report/{id}/update', 'ReportController@update')->name('admin.report.update');
    // Comments confirmation
    Route::get('comments', 'CommentsController@adminComments')->name('admincomments'); /* Список всех комментариев в админке */
    Route::get('comment.confirm/{id}', 'CommentsController@commentConfirm')->name('comment.confirm'); /* Одобрить комментарий */
    Route::get('comment/{id}/delete', 'CommentsController@deleteComment')->name('deletecomment'); /* Удаление комментария */
    //Albums
    Route::get('albums', 'AlbumController@adminAlbums')->name('adminAlbums');
    Route::get('createalbum', 'AlbumController@create')->name('album.create');
    Route::post('createalbum', 'AlbumController@store')->name('album.create');
    Route::get('album/{id}/delete', 'AlbumController@destroy')->name('album.destroy');
    Route::get('album/{id}/edit', 'AlbumController@edit')->name('album.edit');
    Route::post('album/{id}/update', 'AlbumController@update')->name('album.update');
    // Search
    Route::get('/adminsearch/results', 'AdminController@search')->name('admin.search');
});

//коллекция роутов только для админа
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    // Users
    Route::get('users', 'UserController@adminUsers')->name('users'); //Список пользователей
    Route::get('profile/{id}/delete', 'UserController@destroy')->name('profile.destroy'); //Удаление пользователя
    Route::get('profile/id{id}/edit', 'UserController@edit')->name('profile.edit'); /* Форма редактирования пользователя */
    Route::post('profile/id{id}/edit', 'UserController@edit')->name('profile.edit'); /* Форма редактирования пользователя */
    Route::post('profile/update/{id}', 'UserController@update')->name('profile.update'); /* Изминение пользователя */
    //Feedbacks
    Route::get('feedbacks', 'FeedbacksController@adminFeedbacks')->name('admin.feedback.index'); //Список заявок
    Route::get('feedback/{id}', 'FeedbacksController@show')->name('feedback.show');
    Route::get('feedback/{id}/delete', 'FeedbacksController@destroy')->name('feedback.destroy');
    Route::get('feedback/{id}/reply', 'FeedbacksController@reply')->name('feedback.reply');
    Route::post('feedback/{id}/reply', 'FeedbacksController@reply')->name('feedback.reply');
    //Sliders
    Route::get('sliders', 'SliderController@adminSliders')->name('adminSliders');
    Route::get('slider/{id}', 'SliderController@show')->name('slider.show');
    Route::get('slidercreate', 'SliderController@create')->name('slider.create');
    Route::post('sliderstore', 'SliderController@store')->name('slider.store');
    Route::get('slider/{id}/edit', 'SliderController@edit')->name('slider.edit');
    Route::post('slider/{id}/update', 'SliderController@update')->name('slider.update');
    Route::get('slider/{id}/delete', 'SliderController@destroy')->name('slider.destroy');    
    // Send email
    Route::get('send', 'AdminController@sendMail')->name('sendMail');
    Route::post('send', 'AdminController@sendMail')->name('sendMail');
    Route::get('mail', 'AdminController@mailForm')->name('mail');
    // Classes
    Route::get('students-classes', 'StudentClassController@index')->name('studentsClasses');
    Route::post('students-classes/create', 'StudentClassController@store')->name('storeStudentsClasses');
    Route::post('students-classes/update', 'StudentClassController@update')->name('updateStudentsClasses');
    Route::get('students-classes/delete/{id}', 'StudentClassController@destroy')->name('destroyStudentsClasses');
    // Settings
    Route::get('settings', 'AdminController@settings')->name('settings');
    Route::post('settingsupdate', 'AdminController@settingsUpdate')->name('settings.update');
});

// Колекция роутов для участника комитета с ролью 3
Route::group(['middleware' => ['role:3']], function () {
    // News
    Route::get('usernewscreate', 'NewsController@userNewsCreate')->name('user.news.create'); /* переход на добавление новости пользователем с ролью 3 */
    Route::post('addNews', 'NewsController@userNewsStore')->name('user.addNews');
    //Events
    Route::get('usereventcreate', 'EventController@userEventCreate')->name('user.event.create'); /* переход на добавление события пользователем с ролью 3 */
    Route::post('eventstore', 'EventController@userEventStore')->name('user.event.store'); /* Само добавления события */
    Route::get('createreport', 'ReportController@userReportCreate')->name('user.reports.create'); /* переход на добавление новости пользователем с ролью 3 */
    Route::post('addreport', 'ReportController@store')->name('addreport');
    // Переход на вьюху с возможностью добавления события/новости/отчета
    Route::get('/add', function () {
        return view('add');
    })->name('user.add');
});

// Что могут делать зарегистрированные пользователи
Route::group(['middleware' => 'auth'], function() {
    Route::get('profile/id{id}', 'UserController@profile')->name('profile'); //Просмотр профиля пользователя
    Route::get('profile/id{id}/events', 'UserController@profileEvents')->name('profile.events');
    Route::get('profile/id{id}/news', 'UserController@profileNews')->name('profile.news');
    Route::get('profile/id{id}/reports', 'UserController@profileReports')->name('profile.reports');
    // Comments
    Route::post('/add_comment', 'CommentsController@addComment')->name('add_comment');
    Route::get('deletecomment/{id}', 'CommentsController@deleteComment')->name('deleteComment');
});


// Galery/Album/Image    
Route::get('useralbumscreate', 'AlbumController@userCreate')->name('album.user.create');
Route::post('addimage', 'ImageController@imageAdd')->name('add_image_to_album');
Route::get('image/{id}/delete', 'ImageController@deleteImage')->name('deleteImage');
Route::get('addimage/{id}', 'ImageController@getForm')->name('add_image');

/* Данный роут подтягивает перечень комитетов школы из базы */
Route::get('/about', 'CommitteesController@about')->name('about');
//Committees
Route::get('/committees', 'CommitteesController@index')->name('allCommittees');
Route::get('/committees/committee/{id}', 'CommitteesController@show')->name('oneCommittee');
Route::get('/committees/committee/{committeeId}/news', 'NewsController@committeeNews')->name('newsCommittee');
Route::get('/committees/committee/{committeeId}/events', 'EventController@committeeEvents')->name('eventCommittee');
Route::get('/committees/committee/{committeeId}/reports', 'ReportController@committeeReports')->name('reportsCommittee');

/* Данный роут просто содержит контакты */
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');











