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

Route::get('/', function()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', function()
{
    if(Auth::check())
    {
        $users = App\User::leftJoin('groups', 'users.id_group', '=', 'groups.id')->select('users.*', 'groups.name as groupName')->get();
        return view('users', ['users' => $users]);
    }
    else
    {
        return redirect('login');
    }
})->name('users');

Route::get('/addEvent', function()
{
    return view('/addEvent');
});

Route::get('/events', 'EventController@index')->name('events.index');

Route::post('/events', 'EventController@addEvent')->name('events.add');

Route::get('/groups', 'GroupController@index')->name('groups.index');

Route::post('/groups', 'GroupController@addGroup')->name('groups.add');

Route::get('/joinGroup', 'GroupController@indexJoin')->name('groups.indexJoin');

Route::post('/joinGroup', 'GroupController@joinGroup')->name('groups.join');