<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Partner\PartnerController;
use App\Http\Controllers\Partner\PartnerPrescriptionController;

use App\Http\Controllers\DrugStore\DrugStoreController;
use App\Http\Controllers\DrugStore\DrugStorePrescriptionsController;

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

Route::get('/wel', function () {
    return view('welcome');
});


/*
Admin:

*/
Route::get('admin/panel/login', [AdminController::class, 'showLogin']);
Route::post('admin/panel/loginhandle', [AdminController::class, 'login']);
Route::post('admin/ajax/login', [AdminController::class, 'login']);
Route::prefix('admin/panel')->namespace('App\Http\Controllers\Admin')->middleware(\App\Http\Middleware\Admin::class)->group(function () {
    Route::get('dashboard', [AdminController::class, 'getDashboard']);
    Route::get('logout', [AdminController::class, 'logout']);
});


/*
Partner Patient:
singup - login
patient 

*/
Route::get('partner/panel/login', [PartnerController::class, 'showLogin']);
Route::post('partner/panel/loginhandle', [PartnerController::class, 'login']);
Route::post('partner/ajax/login', [PartnerController::class, 'login']);
Route::prefix('partner/panel')->namespace('App\Http\Controllers\Partner')->middleware(\App\Http\Middleware\Partner::class)->group(function () {
    Route::get('dashboard', [PartnerController::class, 'getDashboard']);
    Route::get('logout', [PartnerController::class, 'logout']);

    Route::get('sendPrescription', [PartnerPrescriptionController::class, 'showsPrescription']);
    Route::post('sendPrescriptionhandle', [PartnerPrescriptionController::class, 'sendPrescription']);
});


/*
DrugStore:

*/
Route::get('drugstore/panel/login', [DrugStoreController::class, 'showLogin']);
Route::post('drugstore/panel/loginhandle', [DrugStoreController::class, 'login']);
Route::post('drugstore/ajax/login', [DrugStoreController::class, 'login']);
Route::prefix('drugstore/panel')->namespace('App\Http\Controllers\DrugStore')->middleware(\App\Http\Middleware\DrugStore::class)->group(function () {
    Route::get('dashboard', [DrugStoreController::class, 'getDashboard']);
    Route::get('logout', [DrugStoreController::class, 'logout']);

    Route::get('getPrescriptions', [DrugStorePrescriptionsController::class, 'getPrescriptions']);
});
