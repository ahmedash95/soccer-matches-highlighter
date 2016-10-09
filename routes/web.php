<?php
Route::get('/', 'HomeController@index');
Route::get('/match/{id}','MatchController@live')->name('match.live');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/dashboard', 'Panel\PanelController@index');
    
    Route::resource('/teams', 'Panel\TeamsController');
    Route::resource('/matches', 'Panel\MatchesController');

    Route::resource('/live-sessions', 'Panel\LiveSessionsController');
    Route::get('/live-sessions/{match_id}/start', 'Panel\LiveSessionsController@start')->name('live-sessions.start');
    Route::post('/live-sessions/{match_id}/comment', 'Panel\LiveSessionsController@postComment')->name('live-sessions.comment');

});
