<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

/** add verify middleware later */
Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pages', function(){
        return view('admin.pages');
    })->name('pages');

    Route::get('/users', function(){
        return view('admin.users');
    })->name('users');
});
