<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AdsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/bonjour/{prenom}', 'App\Http\Controllers\MainController@bonjour');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', 'App\Http\Controllers\UserController@dashboard')->name('dashboard');

Route::resource('ads', '\App\Http\Controllers\AdController');
Route::get('/ads/{ad}/delete', 'App\Http\Controllers\AdController@softdelete');

//Route::resource('AdminUsers', '\App\Http\Controllers\AdminUsersController');
//Route::get('/Users/{Users}/delete', 'App\Http\Controllers\UsersController@softdelete');

//Route::get('/AdminUsers', [App\Http\Controllers\AdminUsersController::class, 'index']);
Route::resource('Users', '\App\Http\Controllers\UsersController');

//Route::get('/Users/{id}', [UsersController::class, 'show']);
Route::get('/Users/delete/{id}', [UsersController::class, 'softdelete']);
Route::get('/Users/{id}/edit', [UsersController::class, 'edit']);



/*Route::delete('users/{id}', function ($id) { 
    Auth::logout();
    $id->delete();
    return redirect('/register/');
    
})->name('Deleteuser');*/