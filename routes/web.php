<?php



Route::get('/', function () {
    return view('welcome');
	});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'web'], function () {
	
    Route::auth();

    Route::get('/home', 'HomeController@index');


    Route::resource('skdu','SkduController');
	Route::get('api/skdu', 'SkduController@apiSkdu')->name('api/skdu');
	Route::get('/skduselesai', 'SkduselesaiController@index');
	Route::get('api/skduselesai','SkduselesaiController@skduselesai')->name('api/skduselesai');


	Route::resource('sktm','SktmController');
	Route::get('/sktm', 'SktmController@index');
	Route::get('api/sktm', 'SktmController@apiSktm')->name('api/sktm');

	Route::get('/sktmselesai', 'SktmselesaiController@index');
	Route::get('api/sktmselesai','SktmselesaiController@sktmselesai')->name('api/sktmselesai');
});