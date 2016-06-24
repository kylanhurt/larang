<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'PagesController@index');

Route::get('/about-us', function() {
	return 'all skrillex is very good :D';
});

//Route::resource('/entity', 'EntitiesController');
Route::get('/entity/new/', 'PagesController@createEntity');

Route::get('/about', 'PagesController@about');
Route::post('/api/user/register/', 'UsersController@create');
Route::get('api/csrf', function(){ 
    return csrf_token();
});
Route::resource('api/authenticate', 'AuthenticateController', ['only' => ['index']]);
Route::post('api/authenticate', 'AuthenticateController@authenticate');
Route::get('api/authenticate/user', 'AuthenticateController@getAuthenticatedUser');

Route::get('api/users/{username}', function($username) {
    $username_client = new Guzzle\Service\Client('https://api.github.com/');
    $response = $username_client->get("users/$username")->send();
    echo $response->getBody();
});