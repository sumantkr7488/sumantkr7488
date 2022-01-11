<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Settings\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    '/contacts'  => ContactController::class,
    '/companies' => CompanyController::class
]);

Auth::routes(['verify' => true]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/settings/account', [AccountController::class, 'index']);