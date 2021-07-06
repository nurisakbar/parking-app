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

$router->get('parking/list', 'ParkingController@list');
$router->get('parking/slot', 'ParkingController@slot');
$router->post('parking/in', 'ParkingController@in');
$router->put('parking/out', 'ParkingController@out');
