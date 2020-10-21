<?php

use  Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::post('/upload','UserController@uploadImage'); 
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*   <!--   Todos Routes -->  */
Route::middleware('auth')->group(function () {
Route::resource('/todo', 'TodoController');

Route::put('/todos/{todo}/complete','TodoController@complete')->name('complete');
Route::delete('/todos/{todo}/incomplete','TodoController@incomplete')->name('incomplete');
});