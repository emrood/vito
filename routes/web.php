<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Event;
use App\Models\Partner;

Route::view('/', 'welcome', ['events' => Event::orderBy('event_date', 'DESC')->skip(0)->take(10)->get(), 'partners' => Partner::all()]);

Route::get('/config/{any}', 'VitoController')->where('any', '.*');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Route::get('/', function()
//{
//    return view('welcome', ['name' => 'James']);
//});
