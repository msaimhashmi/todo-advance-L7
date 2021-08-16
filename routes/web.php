<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::resource('todo', 'TodoController');
Route::put('/todos/{todo}/complete', 'TodoController@complete')->name('todo.complete');

// Route::get('/todos', 'TodoController@index')->name('todo.index');
// Route::get('/todos/create', 'TodoController@create');
// Route::post('/todos/create', 'TodoController@store');
// Route::get('/todos/{todo}/edit', 'TodoController@edit');
// Route::patch('/todos/{todo}/update', 'TodoController@update')->name('todo.update');
// Route::delete('/todos/{todo}/destroy', 'TodoController@destroy')->name('todo.destroy');

// Route Modal Binding 
// Route::get('/todos/{todo:title}/edit', 'TodoController@edit');

Route::get('/sql_queries', 'QueryController@RawSqlQuery');
Route::get('/eloquent', 'EloquentController@eloquent');
Route::post('/upload_avatar', 'EloquentController@uploadAvatar');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
