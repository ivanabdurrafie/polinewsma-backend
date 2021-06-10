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

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('news',  ['uses' => 'BeritaController@index']);

  $router->get('news/{id}', ['uses' => 'BeritaController@getOneNews']);

  $router->get('topic/{id}', ['uses' => 'BeritaController@getNewsByTopic']);

  $router->post('news/create', ['uses' => 'BeritaController@createNews']);

  $router->delete('news/delete/{id}', ['uses' => 'BeritaController@deleteNews']);

  $router->put('news/update/{id}', ['uses' => 'BeritaController@updateNews']);
});


