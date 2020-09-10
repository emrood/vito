<?php

Route::group(['prefix' => 'api/v1', 'namespace' => 'App\Api\Controllers'], function () {
    //
    Route::get('/users/test',[
        'uses' => 'UserController@test',
        'as' => 'users.test'
    ]);
    Route::resource('users', 'UserController');
    Route::resource('events', 'EventController');
    Route::resource('tickets', 'TicketController');
    Route::resource('roles', 'RoleController');
});
