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

$router->post('/login', 'UserController@login');

$router->group(['middleware' => 'auth'], function () use ($router) {
    // Users
    $router->group(['prefix' => 'users'], function () use ($router) {
        $router->get('/', 'UserController@index');
        $router->post('/', 'UserController@store');
        $router->get('/{id}', 'UserController@show');
        $router->patch('/update/{id}', 'UserController@update');
        $router->delete('/{id}', 'UserController@destroy');
    });

    $router->group(['prefix' => 'transactions'], function () use ($router) {
        $router->post('/', 'TransactionController@store');
        $router->get('/{transactionNumber}', 'TransactionController@checkStatus');
        $router->get('/{transactionNumber}/status', 'TransactionController@getStatus');
        $router->put('/{transactionNumber}/status/{status}', 'TransactionController@updateStatus');
    });

    // webhooks
    $router->post('/webhook', 'WebhookController@handle');

    // Refund
    $router->post('/refund', 'RefundController@refund');

    // Notifikasi
    $router->get('/notifications/{userId}', 'NotificationController@getUserNotifications');
    
    // melihat akun yang sedang login
    $router->get('/me', 'UserController@me');

    // logout
    $router->post('/logout', 'UserController@logout');
});

