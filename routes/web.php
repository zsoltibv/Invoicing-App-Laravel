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
    return redirect('/account/dashboard');
});

Route::get('/account/dashboard', function () {
    return view('pages.dashboard');
})->name('account.dashboard');

Route::get('/account/factura', function () {
    return view('pages.factura');
})->name('account.factura');
