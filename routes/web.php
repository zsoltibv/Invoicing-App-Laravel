<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\DateFirmaController;

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
    return view('home');
})->name('home');

Route::get('/account/dashboard', function () {
    return view('pages.dashboard');
})->name('account.dashboard');

Route::get('/account/factura', [FacturaController::class, 'index'])->name('account.factura');

Route::get('/account/date-firma', [DateFirmaController::class, 'index'])->name('account.date-firma');
Route::get('/account/getdetails', [DateFirmaController::class, 'getCompanyDetails'])->name('account.getdetails');

Auth::routes();