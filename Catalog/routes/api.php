<?php

use Illuminate\Http\Request;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});

Route::get('/products', 'ProductController@index');
Route::get('/products/{product}', 'ProductController@show');

Route::delete('/products/{product}', 'ProductController@destroy');
Route::post('/products', 'ProductController@store');
Route::put('/products/{product}', 'ProductController@update');

//Route::apiResource('products', 'ProductController')


Route::get('/categories', 'CategoryController@index');
Route::get('/fragrances', 'FragranceController@index');
