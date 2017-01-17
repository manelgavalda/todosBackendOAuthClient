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
//Route::get('/redirect', 'RedirectController@redirectWithQuery')->name('redirect');

Route::get('/redirect', function () {
//    if (userHaveToken()) {
//
//    } else {
    $query = http_build_query([
        'client_id' => '1',
        'redirect_uri' => 'http://oauthclient.dev:8001/auth/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);
    return redirect('http://todos.dev:8000/oauth/authorize?'.$query);
//    }
});

Route::get('/redirect_implicit', function () {
//    if (userHaveToken()) {
//
//    } else {
    $query = http_build_query([
        'client_id' => '3',
        //És localhost (només una redirecció).
        'redirect_uri' => 'http://oauthclient.dev:8001/implicit',
        'response_type' => 'token', //implicit
        'scope' => '',
    ]);
    return redirect('http://todos.dev:8000/oauth/authorize?'.$query);
//    }
});

Route::get('/auth/callback', 'AuthCallbackController@makeAuthCallback')->name('AuthCallback');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('implicit', 'ImplicitController@index')->name('implicit');

    Route::get('tasks', 'TasksController@index')->name('tasks');

    //return json_decode((string) $response->getBody(), true);
    //TODO: get al todosbackend tasks. Li pasem token i agafa el token del json anterior. Agafar tokens desde el headers(ja ho vam fer al github repos) on fica als headers el token que pertoquen.
});