<?php

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
    return "";
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('ban', ['uses' => 'API\BanController@create']);
    $router->get('ban', ['uses' => 'API\BanController@index']);
    $router->get('ban/find', ['uses' => 'API\BanController@findByIp']);
    $router->delete('ban/{id}', ['uses' => 'API\BanController@delete']);
});
