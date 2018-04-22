<?php

use Dingo\Api\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Create Dingo Router
$api = app(Router::class);

// Create a Dingo Version Group
$api->version('v1', function ($api) {
    $api->group(['prefix' => 'auth'], function ($api) {
        $api->post('register', 'App\\Api\\V1\\Controllers\\RegisterController@register');
    });

    // Protected routes
    $api->group(['middleware' => 'auth:api'], function ($api) {
        $api->get('protected', function () {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.',
            ]);
        });
    });
});
