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

    $router->group(['prefix' => '/auth'], function () use ($router){

        $router->post('/register', 'UserController@postUser');
    });

    /**
     * Estas rutas estan protegidas
     */
    $router->group(['prefix' => '/user', 'middleware' => 'auth' ], function () use ($router){
      
        $router->get('/list', 'UserController@showUsers');
        $router->get('/{id}', 'UserController@showUser');
        $router->put('/update/{id}', 'UserController@upUser');
        $router->delete('/disable/{id}', 'UserController@disableUser');
        $router->get('/enable/{id}', 'UserController@enableUSer');
    });
});
