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
    return view('child');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/drills/index', 'DrillsController@index')->name('drills.index');
Route::get('/drills/new', 'DrillsController@new')->name('drills.new');
Route::post('/drills', 'DrillsController@create')->name('drills.create');
Route::get('/drills/{id}/edit', 'DrillsController@edit')->name('drills.edit');
Route::post('/drills/{id}', 'DrillsController@update')->name('drills.update');
Route::post('/drills/{id}/delete', 'DrillsController@delete')->name('drills.delete');

Route::get('/drills/{id}', 'DrillsController@show')->name('drills.show');
Route::get('/mypage', 'DrillsController@mypage')->name('drills.mypage')->middleware('check');
