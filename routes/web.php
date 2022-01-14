<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => '/api' ], function () use ($router){

    $router->group(['prefix' => '/user' ], function () use ($router){

        $router->post('/register', 'UserController@postUser');
        $router->get('/list', 'UserController@showUsers');
        $router->put('/update/{id}', 'UserController@upUser');
        $router->delete('/disable/{id}', 'UserController@disableUser');
        $router->get('/enable/{id}', 'UserController@enableUSer');
    });
});
