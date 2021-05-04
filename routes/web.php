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
    return view('index');
});

Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

/*      ADMIN ROUTES       */

Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin');

Route::get('/all-menbre-role', 'App\Http\Controllers\AdminController@allRole')->name('all');

Route::get('/Edit-role/{id}', 'App\Http\Controllers\AdminController@EditRole')->name('admin.edit');

Route::put('/update-form/{id}', 'App\Http\Controllers\AdminController@update');

Route::delete('/delete-form/{id}', 'App\Http\Controllers\AdminController@delete');

Route::get('/add-new-user', 'App\Http\Controllers\AdminController@display');

Route::post('/add-new-user/add', 'App\Http\Controllers\AdminController@addUser');

Route::get('/myprofail', function(){
    
    return view('admin.profail');

});


/*            MENBRE ROUTES              */
Route::get('/menbre', 'App\Http\Controllers\MenbreController@index')->name('menbre');


