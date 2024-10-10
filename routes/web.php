<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Dashboard;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['reset' => false]);

Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['2']], function () {
    Route::get('/dashboard', '\App\Http\Controllers\Dashboard@admin')->name('admin.dashboard');
    Route::resource('/profile', '\App\Http\Controllers\Profile');
});

Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['1']], function () {
    Route::get('/tutor/dashboard', '\App\Http\Controllers\Dashboard@tutor')->name('tutor.dashboard');
    Route::resource('/profile', '\App\Http\Controllers\Profile');
});

Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['0']], function () {
    Route::get('/home', '\App\Http\Controllers\Dashboard@learner')->name('home');
    Route::resource('/profile', '\App\Http\Controllers\Profile'); 
    Route::resource('/tutor', '\App\Http\Controllers\Tutor'); 
});

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Auth::routes(['reset' => false]);

?>