<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\LoginCTRL;


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
Route::group(['prefix' => 'auth', 'as' => 'auth.'], static function () {
    Route::get('login', [LoginCTRL::class, 'index'])->name('login');
    Route::post('login', [LoginCTRL::class, 'login'])->name('login');

    Route::get('logout', function () {
        Auth::logout();
        return Redirect::route('auth.login');
    })->name('logout');
});

Route::get('/', function () {
    return view('pages.home.index');
})->name('home.index');

Route::resource('company', \App\Http\Controllers\Company\IndexCTRL::class)
    ->middleware('admin.auth');
Route::resource('employee', \App\Http\Controllers\Employee\IndexCTRL::class)
    ->middleware('user.auth');
