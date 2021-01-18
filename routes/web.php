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

Route::get('/', function () {
    return view('welcome');
});

// Route::view('/dashboard', 'admin.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// admin route
Route::group(['prefix' => 'admin', 'middleware'=>['auth']], 
    function() {
        Route::get('/',function(){
            return view('admin.index');
        });
        Route::get('/provinsi',function(){
            return view('admin.provinsi.index');
        });
    });