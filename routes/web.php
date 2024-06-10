<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminInsuranceController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PaymentBillController;
use App\Http\Controllers\PengingatController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Login
Route::redirect('/', '/login');
Auth::routes();

Route::middleware(['auth', 'role:admin'])->group(function () {
    //Admin
    Route::get('/admin', [AdminController::class, 'index']);
    Route::resource('/asuransi', AdminInsuranceController::class);
    Route::get('/card', [AdminController::class, 'card']);
    Route::get('/transaksi', [AdminController::class, 'transaksi']);
    Route::get('/user', [AdminController::class, 'user']);
    Route::resource('/pengingat', PengingatController::class);
});

Route::middleware(['auth', 'role:user'])->group(function () {
    //User
    Route::get('/dashboard', [homeController::class, 'index']);
    Route::get('/history', [HistoryController::class, 'index']);
    Route::get('/addtransfer', [TransferController::class, 'add']);
    Route::post('/transfer', [TransferController::class, 'index']);
    Route::get('/transfer/paymentbill', [TransferController::class, 'payment']);
    Route::post('/transfer/paymentbill/transactionsuccess', [TransferController::class, 'success']);
    Route::post('/topup', [TransferController::class, 'topup']);
    Route::post('/withdraw', [TransferController::class, 'withdraw']);

    Route::get('/assurance', [AssuranceController::class, 'index']);
    Route::post('/assurance/session', [AssuranceController::class, 'store']);
    Route::get('/assurance/paymentbill', [AssuranceController::class, 'payment']);
    Route::post('/assurance/paymentbill/transactionsuccess', [AssuranceController::class, 'success']);

});

// Route::get('/', [loginController::class, 'index']);
// Route::Post('/login-proses', [loginController::class, 'proses']);
// Route::get('/register', [loginController::class, 'register']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
