<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\DateContController;
use App\Http\Controllers\DateFirmaController;
use App\Http\Controllers\DateBancareController;
use App\Http\Controllers\DateClientiController;

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

Route::get('/account', [HomeController::class, 'index'])->name('account');

Route::get('/account/factura', [FacturaController::class, 'index'])->name('account.factura');

Route::get('/account/date-firma', [DateFirmaController::class, 'index'])->name('account.date-firma');
Route::get('/account/date-firma/{id}', [DateFirmaController::class, 'edit'])->name('date-firma.edit');
Route::post('/account/date-firma/{id}', [DateFirmaController::class, 'getCompanyDetails'])->name('date-firma.getdetails');
Route::put('/account/date-firma/{id}', [DateFirmaController::class, 'update'])->name('date-firma.update');
Route::delete('/account/date-firma/{id}', [DateFirmaController::class, 'destroy'])->name('date-firma.destroy');

Route::get('/account/date-cont', [DateContController::class, 'index'])->name('account.date-cont');
Route::put('/account/date-cont/{id}', [DateContController::class, 'update'])->name('date-cont.update');

Route::get('/account/date-bancare', [DateBancareController::class, 'index'])->name('account.date-bancare');
Route::post('/account/date-bancare/{id}', [DateBancareController::class, 'store'])->name('date-bancare.store');
Route::delete('/account/date-bancare/{id}', [DateBancareController::class, 'destroy'])->name('date-bancare.destroy');

Route::get('/account/date-clienti', [DateClientiController::class, 'index'])->name('account.date-clienti');

Auth::routes();