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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/auth/token', function () {
    $http = new GuzzleHttp\Client;
    $response = $http->post('http://localhost:8000/oauth/token', [
        'form_params' => [
            'grant_type' => 'password',
            'client_id' => '8',
            'client_secret' => 'Nk2GsJ47whHpRtcy8aBwXQKg59brvFzbFxz6LbLb',
            'username' => 'me@miranrasulian.com',
            'password' => 'secret',
            'scope' => '',
        ],
    ]);
    return json_decode((string) $response->getBody(), true);
});