<?php

Route::group(
    ['prefix' => 'test'], function () {
        Route::get('hello', ['as' => 'test.hello', 'uses' => 'TestController@hello']);
        Route::get('items', ['as' => 'test.items.index', 'uses' => 'TestController@itemsIndex']);
        Route::any('auth',  ['uses' => 'TestController@requireAuth', 'before' => 'auth.api']);
        Route::any('{uri}', ['uses' => 'MuffinsController@respondNotFound']);
    }
);

Route::resource('muffins', 'MuffinsController');

Route::any('{uri}', ['uses' => 'MuffinsController@respondNotFound']);