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

$router->get('/bills', [
    'as' => 'bills-index',
    'uses' => 'BillController@index'
]);

$router->post('/bills', [
    'as' => 'bills-create',
    'uses' => 'BillController@create'
]);

$router->get('/bills/{id:[0-9]+}', [
    'as' => 'bills-show',
    'uses' => 'BillController@show'
]);

$router->patch('/bills/{id:[0-9]+}', [
    'as' => 'bills-update',
    'uses' => 'BillController@update'
]);

$router->delete('/bills/{id:[0-9]+}', [
    'as' => 'bills-destroy',
    'uses' => 'BillController@destroy'
]);
