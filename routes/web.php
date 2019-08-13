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
    // $ruang = \App\Ruang::all();
    return view('welcome');
});

// Route::resource('events','EventController');
Route::post('/addEvent', 'EventController@store')->name('addEvent');
Route::get('/addeventurl/{id}','EventController@display');
Route::get('/displaydata','EventController@show');
route::get('/deleteevent','EventController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/events/{id}', 'EventController@index')->name('events');
Route::get('/showdata/{id}', 'EventController@show')->name('show');
Route::get('/editdata/{id}', 'EventController@edit')->name('edit');
Route::delete('/deletedata/{id}', 'EventController@destroy')->name('delete');
Route::post('/updatedata', 'EventController@update')->name('update');
Route::get('/addRuang', 'EventController@addRuang')->name('addRuang');
Route::post('/addRuang', 'EventController@addRuangSave')->name('addRuang');
