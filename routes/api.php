<?php

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
Route::group(['namespace' => 'API', 'prefix' => 'auth'], function () {
    Route::post('/login', 'AuthController@login');
    Route::post('/register', 'AuthController@register');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout');

        Route::get('/user', 'AuthController@user');
    });
});

Route::group([
    'middleware' => ['auth:api', 'cors']], function () {

});

Route::resource('missions', 'MissionController');

Route::resource('games', 'GameController');

Route::resource('challenges', 'ChallengeController');

Route::get('test', function(){
    return response()->json(['data' => Auth::guard('api')->user()]);
});









