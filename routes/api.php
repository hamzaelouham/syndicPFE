<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/clients',"App\Http\Controllers\Alldata@index");

Route::post('api/client',"App\Http\Controllers\Alldata@store");

Route::get('/api/client/{id}',"App\Http\Controllers\Alldata@GetById");

Route::put('/api/client/{id}', 'App\Http\Controllers\Alldata@update');

Route::delete('api/client/{id}','App\Http\Controllers\Alldata@deleteById'); 
