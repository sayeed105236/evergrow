<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\AdminShowPaymentController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

//Route::get('/home', [FrontendController::class,'index2'])->name('home')->middleware('auth');
Route::get('/home/dashboard/{id}', [FrontendController::class,'index'])->name('user-dashboard')->middleware('auth');
Route::post('/user/dashboard/add-money', [AddMoneyController::class,'Store'])->name('money-store')->middleware('auth');
Route::get('/home/referrals/{id}', [ReferralController::class,'index'])->name('referrals')->middleware('auth');
Route::get('/home/activation-package/{id}', [HomeController::class,'Activate'])->name('activation')->middleware('auth');
Route::post('/home/activate-package/', [HomeController::class,'ActivatePackage'])->name('activate-package')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard/', function () {
    return view('user.home');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/dashboard', function () {
    return view('admin.home');
})->name('admin.pages.dashboard');
//admin routes
Route::get('/admin/user_lists', [UserListController::class,'Manage'])->name('user-list')->middleware('authadmin');
//Payment method Routes
Route::get('/admin/payment-method', [PaymentMethodController::class,'index'])->name('payment-method')->middleware('authadmin');
Route::post('/admin/payment-method/store', [PaymentMethodController::class,'Store'])->name('payment-method-store')->middleware('authadmin');
Route::get('/admin/payment-method/delete/{id}', [PaymentMethodController::class,'Delete'])->middleware('authadmin');
Route::post('/admin/payment-method/update', [PaymentMethodController::class,'Update'])->name('payment-method-update')->middleware('authadmin');
Route::get('/admin/add-money/requests', [AdminShowPaymentController::class,'Manage'])->name('deposit-manage')->middleware('authadmin');
Route::get('/admin/add-money-approve/{id}', [AdminShowPaymentController::class,'approve'])->middleware('authadmin');
Route::get('/admin/add-money-delete/{id}', [AdminShowPaymentController::class,'destroy'])->middleware('authadmin');
