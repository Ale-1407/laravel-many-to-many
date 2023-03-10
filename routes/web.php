<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//gestione rotte sotto autenticazione
Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('index');
        //controller CRUD nella sezione admin
        Route::resource('/posts', PostController::class);
    });

//gestione tutte le rotte che non usano autenticazione
Route::get('{any?}', function(){
    return view('guest.home');
})->where("any", ".*");

