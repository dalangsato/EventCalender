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

//Gedung
Route::get('/addGedung', 'EventController@addGedung')->name('addGedung');
Route::get('/editGedung/{id}', 'EventController@editGedung')->name('editGedung');
Route::get('/detailGedung/{id}', 'EventController@detailGedung')->name('detailGedung');
Route::get('/deleteGedung/{id}', 'EventController@deleteGedung')->name('deleteGedung');

Route::post('/addGedung', 'EventController@addGedungSave')->name('addGedungSave');
Route::post('/editGedung', 'EventController@editGedungSave')->name('editGedungSave');

//Lantai
Route::get('/addLantai/{id}', 'EventController@addLantai')->name('addLantai');
Route::get('/editLantai/{id}', 'EventController@editLantai')->name('editLantai');
Route::get('/deleteLantai/{id}', 'EventController@deleteLantai')->name('deleteLantai');
Route::get('/detailLantai/{id}', 'EventController@detailLantai')->name('detailLantai');

Route::post('/addLantaiSave', 'EventController@addLantaiSave')->name('addLantaiSave');
Route::post('/editLantaiSave', 'EventController@editLantaiSave')->name('editLantaiSave');

//Ruangan
Route::get('/addRuang/{id}', 'EventController@addRuang')->name('addRuang');
Route::get('/editRuang/{id}', 'EventController@editRuang')->name('editRuang');
Route::get('/deleteRuang/{id}', 'EventController@deleteRuang')->name('deleteRuang');

Route::post('/addRuangSave', 'EventController@addRuangSave')->name('addRuangSave');
Route::post('/editRuangSave', 'EventController@editRuangSave')->name('editRuangSave');
