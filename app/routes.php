<?php

Route::group( ['prefix' => 'test'], function () {
    Route::get('hello', ['as' => 'test.hello', 'uses' => 'TestController@hello']);
    Route::get('items', ['as' => 'test.items.index', 'uses' => 'TestController@itemsIndex']);
    Route::any('{uri}', ['uses' => 'TestController@respondNotFound']);
});
