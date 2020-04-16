<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/users', 'UserController@index');
Route::get('/users/{user}', 'UserController@show');

Route::get('/users/{user}/edit', 'UserController@edit');
Route::put('/users/{user}/edit', 'UserController@update');



Route::get('/prueba', function () {
    $user = App\user::findOrFail(1);
    //$roles = $user->roles;//roles es la funcion que creamos en el modelo como relacion
    //return $roles[1]->roleName;
    //para ver que usuarios tienen el rol admin
    //$roles = App\role::findOrFail(1);
    //return $roles->users;
    //probando otra cosa
    $ver = $user->roles()->where('roleName', 'admin')->first();
    return $ver;
});