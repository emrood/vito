<?php

use Illuminate\Http\Request;
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 10-Sep-20
 * Time: 9:16 AM
 */
Route::resource('users', 'UserController');
Route::resource('events', 'EventController');
Route::resource('tickets', 'TicketController');
Route::resource('roles', 'RoleController');
