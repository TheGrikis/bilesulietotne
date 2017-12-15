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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('landingpage');
});

Route::get('events', 'EventController@index');
Route::get('tickets', 'TicketController@index');
Route::get('ticket/{ticket_id}', 'TicketController@show');
Route::get('map', 'MapController@index');
