<?php

Route::get('/', 'IndexController@getMain')->name('main');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

// News, article
Route::get('news', 'NewsController@index')->name('news');
Route::get('news/article-{id}', 'NewsController@article')->name('article');
Route::post('news/choose', 'NewsController@chooseNews')->name('article.choose');

// Events, event
Route::get('events', 'EventController@index')->name('event.index');
Route::get('events/event-{id}', 'EventController@show')->name('event.show');
Route::post('events/choose', 'EventController@chooseEvents')->name('event.choose');

//Report
Route::prefix('reports/')->group(function () {
    Route::get('/', 'ReportController@index')->name('reports');
    Route::get('report-{id}', 'ReportController@show')->name('report.show');
    Route::post('choose', 'ReportController@chooseReports')->name('report.choose');
    Route::get('add_check/{id}', 'CheckController@create')->name('check.create');
    Route::post('add_check', 'CheckController@store')->name('check.store');
    Route::get('check/{id}/delete', 'CheckController@deleteCheck')->name('check.delete');
});


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
Route::group(['prefix' => 'admin/', 'middleware' => 'adminandchief'], function() {
    Route::get('/', 'AdminController@index')->name('admin');
    // News
    Route::get('news', 'NewsController@adminNews')->name('adminnews');
    Route::post('news/choose', 'NewsController@chooseAdminNews')->name('article.admin.choose');
    Route::get('news/article/create', 'NewsController@create')->name('newsview');
    Route::post('news/article/store', 'NewsController@adminNewsStore')->name('admin.addNews');
    Route::get('news/article/{id}/edit', 'NewsController@edit')->name('article.edit'); /* Редактирование новость */
    Route::post('news/article/{id}/update', 'NewsController@update')->name('article.update'); /* Редактирование новость */
    Route::get('news/article/{id}/delete', 'NewsController@destroy')->name('deletenews'); /* Удаление новости */
    // Events
    Route::get('events', 'EventController@adminEvents')->name('adminevents'); /* Список всех событий в админке */
    Route::post('events/choose', 'EventController@chooseAdminEvents')->name('event.admin.choose');
    Route::get('events/event/create', 'EventController@create')->name('event.create');
    Route::post('events/event/store', 'EventController@adminEventStore')->name('admin.event.store');
    Route::get('events/event/{id}/delete', 'EventController@destroy')->name('event.delete'); /* Удаление события */
    Route::get('events/event/{id}/edit', 'EventController@edit')->name('event.edit'); /* Редактирование события */
    Route::post('events/event/{id}/update', 'EventController@update')->name('event.update'); /* Редактирование события */
    //Reports
    Route::get('reports', 'ReportController@adminIndex')->name('adminReports');
    Route::post('reports/choose', 'ReportController@chooseAdminReports')->name('admin.report.choose');
    Route::get('reports/report/create', 'ReportController@create')->name('admin.report.create');
    Route::post('reports/report/store', 'ReportController@store')->name('admin.report.store');
    Route::get('reports/report/{id}/delete', 'ReportController@destroy')->name('admin.report.destroy');
    Route::get('reports/report/{id}/edit', 'ReportController@edit')->name('admin.report.edit');
    Route::post('reports/report/{id}/update', 'ReportController@update')->name('admin.report.update');
    // Comments confirmation
    Route::get('comments', 'CommentsController@adminComments')->name('admincomments'); /* Список всех комментариев в админке */
    Route::get('comment.confirm/{id}', 'CommentsController@commentConfirm')->name('comment.confirm'); /* Одобрить комментарий */
    Route::get('comment/{id}/delete', 'CommentsController@deleteComment')->name('deletecomment'); /* Удаление комментария */
    //Albums
    Route::get('albums', 'AlbumController@adminAlbums')->name('adminAlbums');
    Route::get('albums/album/create', 'AlbumController@create')->name('album.create');
    Route::post('albums/album/store', 'AlbumController@store')->name('album.store');
    Route::get('albums/album/{id}/delete', 'AlbumController@destroy')->name('album.destroy');
    Route::get('albums/album/{id}/edit', 'AlbumController@edit')->name('album.edit');
    Route::post('albums/album/{id}/update', 'AlbumController@update')->name('album.update');
    // Search
    Route::get('search/results', 'AdminController@search')->name('admin.search');
});

//коллекция роутов только для админа
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    // Users
    Route::get('users', 'UserController@adminUsers')->name('users'); //Список пользователей
    Route::get('users/profile/{id}/delete', 'UserController@destroy')->name('profile.destroy'); //Удаление пользователя
    Route::get('users/profile/id{id}/edit', 'UserController@edit')->name('profile.edit'); /* Форма редактирования пользователя */
    Route::post('users/profile/id{id}/edit', 'UserController@edit')->name('profile.edit'); /* Форма редактирования пользователя */
    Route::post('users/profile/update/{id}', 'UserController@update')->name('profile.update'); /* Изменение пользователя */
    //Feedbacks
    Route::get('feedbacks', 'FeedbacksController@adminFeedbacks')->name('admin.feedback.index'); //Список заявок
    Route::get('feedbacks/feedback/{id}', 'FeedbacksController@show')->name('feedback.show');
    Route::get('feedbacks/feedback/{id}/delete', 'FeedbacksController@destroy')->name('feedback.destroy');
    Route::get('feedbacks/feedback/{id}/reply', 'FeedbacksController@reply')->name('feedback.reply');
    Route::post('feedbacks/feedback/{id}/reply', 'FeedbacksController@reply')->name('feedback.reply');
    //Sliders
    Route::get('sliders', 'SliderController@adminSliders')->name('adminSliders');
    Route::get('sliders/slider/{id}', 'SliderController@show')->name('slider.show');
    Route::get('slider/create', 'SliderController@create')->name('slider.create');
    Route::post('sliders/slider/store', 'SliderController@store')->name('slider.store');
    Route::get('sliders/slider/{id}/edit', 'SliderController@edit')->name('slider.edit');
    Route::post('sliders/slider/{id}/update', 'SliderController@update')->name('slider.update');
    Route::get('sliders/slider/{id}/delete', 'SliderController@destroy')->name('slider.destroy');
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
    Route::post('settings/update', 'AdminController@settingsUpdate')->name('settings.update');
});

// Колекция роутов для участника комитета с ролью 3
Route::group(['middleware' => ['role:3']], function () {
    // News
    Route::get('news/article/create', 'NewsController@userNewsCreate')->name('user.news.create');
    Route::post('news/article/store', 'NewsController@userNewsStore')->name('user.addNews');
    //Events
    Route::get('events/event/create', 'EventController@userEventCreate')->name('user.event.create');
    Route::post('events/event/store', 'EventController@userEventStore')->name('user.event.store');
    //Reports
    Route::get('reports/report/create', 'ReportController@userReportCreate')->name('user.reports.create');
    Route::post('reports/report/store', 'ReportController@store')->name('addreport');
    // Переход на вьюху с возможностью добавления события/новости/отчета
    Route::get('/add', function () {
        return view('add');
    })->name('user.add');
});


// Что могут делать зарегистрированные пользователи
Route::group(['prefix' => 'profile/', 'middleware' => 'auth'], function() {
    Route::get('id{id}', 'UserController@profile')->name('profile'); //Просмотр профиля пользователя
    Route::get('id{id}/events', 'UserController@profileEvents')->name('profile.events');
    Route::get('id{id}/news', 'UserController@profileNews')->name('profile.news');
    Route::get('id{id}/reports', 'UserController@profileReports')->name('profile.reports');
    // Comments
    Route::post('add_comment', 'CommentsController@addComment')->name('add_comment');
    Route::get('deletecomment/{id}', 'CommentsController@deleteComment')->name('deleteComment');
});


// Galery/Album/Image    
Route::get('create/album', 'AlbumController@userCreate')->name('album.user.create');
Route::post('album/addimage', 'ImageController@imageAdd')->name('add_image_to_album');
Route::get('album/image/{id}/delete', 'ImageController@deleteImage')->name('deleteImage');
Route::get('album/addimage/{id}', 'ImageController@getForm')->name('add_image');

/* Данный роут подтягивает перечень комитетов школы из базы */
Route::get('/about', 'CommitteesController@about')->name('about');
//Committees

Route::prefix('committees/')->group(function () {
    Route::get('/', 'CommitteesController@index')->name('allCommittees');
    Route::get('/committee-{id}', 'CommitteesController@show')->name('oneCommittee');
    Route::get('/committee/{committeeId}/news', 'NewsController@committeeNews')->name('newsCommittee');
    Route::get('/committee/{committeeId}/events', 'EventController@committeeEvents')->name('eventCommittee');
    Route::get('/committee/{committeeId}/reports', 'ReportController@committeeReports')->name('reportsCommittee');
});



/* Данный роут просто содержит контакты */
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');











