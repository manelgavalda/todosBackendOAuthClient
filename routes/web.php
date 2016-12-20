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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('tasks', 'TasksController@index')->name('tasks');



});

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '1',
        'redirect_uri' => 'http://localhost:8087/auth/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);
    //url del todosBackend.
    return redirect('http://localhost:8084/oauth/authorize?'.$query);
});

Route::get('/auth/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://localhost:8084/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '1',
            'client_secret' => 'AtuhErSrAIzzktbDER2rbLvNAa1xNhxe6JoEjaIO',
            'redirect_uri' => 'http://localhost:8087/auth/callback',
            'code' => Request::input('code'),
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
    //TODO: get al todosbackend tasks. Li pasem token i agafa el token del json anterior. Agafar tokens desde el headers(ja ho vam fer al github repos) on fica als headers el token que pertoca.
});