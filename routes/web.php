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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/calendar', function() {
    /*$event = \Calendar::event(
        "Valentine's Day", //event title
        true, //full day event?
        '2015-02-14', //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
        '2015-02-14', //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
        1, //optional event ID
        [
            'url' => 'http://full-calendar.io'
        ]
    );*/
    return view('calendar'/*, ['event' => $event]*/);
});

Route::get('/addEvent', function() {
    return view('/addEvent');
});

Route::get('events', 'EventController@index')->name('events.index');

Route::post('events', 'EventController@addEvent')->name('events.add');