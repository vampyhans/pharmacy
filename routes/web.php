<?php

use App\Http\Controllers\PharmarcyController;
use App\Http\Controllers\UserController;
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
})->middleware('ToHome');


Auth::routes();

//user routes
Route::get('dashboard', [UserController::class, 'index'])->name('user-home');
Route::get('createPrescription', [UserController::class, 'createPrescription'])->name('createPrescription');
Route::post('postPrescription', [UserController::class, 'postPrescription'])->name('postPrescription');
Route::get('ViewQuotation/{id}', [UserController::class, 'ViewQuotation'])->name('ViewQuotation');
Route::get('ViewQuotationDetails/{id}', [UserController::class, 'ViewQuotationDetails'])->name('ViewQuotationDetails');
Route::post('postPrescription', [UserController::class, 'postPrescription'])->name('postPrescription');
Route::post('acceptQuotation', [UserController::class, 'acceptQuotation'])->name('acceptQuotation');
Route::post('rejectQuotation', [UserController::class, 'rejectQuotation'])->name('rejectQuotation');

//pharmacy
Route::get('pharmacyDashboard', [PharmarcyController::class, 'index'])->name('pharmacy-home');
Route::get('ViewPrescription/{id}', [PharmarcyController::class, 'ViewPrescription'])->name('ViewPrescription');
Route::get('addQuotation/{id}', [PharmarcyController::class, 'addQuotation'])->name('addQuotation');
Route::post('saveQuotation', [PharmarcyController::class, 'saveQuotation'])->name('saveQuotation');