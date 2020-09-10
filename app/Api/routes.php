<?php

Route::group(['prefix' => 'api/v1', 'namespace' => 'App\Api\Controllers'], function () {
    //
    Route::resource('users', 'UserController');
    Route::resource('models_events', 'Models\EventController');
    Route::resource('models_tickets', 'Models\TicketController');
    Route::resource('models_roles', 'Models\RoleController');
    Route::resource('events', 'EventController');
    Route::resource('tickets', 'TicketController');
    Route::resource('roles', 'RoleController');
});
