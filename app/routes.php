<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get(
    '/', function () {
        return View::make('hello');
    }
);

Route::group(
    ['prefix' => 'test'],
    function () {
        Route::get('hello', function () {
            return ['message' => 'Hello World!'];
        });

        Route::get('items', function () {
            return [
                'items' => ['foo']
            ];
        });

        Route::any('{uri}', function ($uri) {
            return Response::json(['message' => "URI " . Request::path() . " not found."], 404);
        });
    }
);
