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

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('brands/{id}', 'api\v1\BrandController@get');
    Route::get('brands', 'api\v1\BrandController@all');

    Route::get('categories/{id}', 'api\v1\CategoryController@get');
    Route::get('categories', 'api\v1\CategoryController@all');

    Route::get('cards', 'api\v1\CardController@findByName');

    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', 'UserController@getAuthenticatedUser');
    });
    Route::group(['middleware' => ['admin.verify']], function() {
        Route::post('cards', 'api\v1\CardController@store');
        Route::put('cards/{id}', 'api\v1\CardController@update');
        Route::delete('cards/{id}', 'api\v1\CardController@delete');
    });
    
});
