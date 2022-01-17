<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\AddMoneyController;
use App\Http\Controllers\AdminShowPaymentController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserPaymentMethodController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ClubController;

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
Route::get('/home/sponsor_bonus_history/{id}', [FrontendController::class,'sponsor_bonus'])->name('sponsor-bonus-history')->middleware('auth');
Route::get('/home/binary_bonus_history/{id}', [FrontendController::class,'pair_bonus'])->name('pair-bonus-history')->middleware('auth');
Route::get('/home/profit_bonus_history/{id}', [FrontendController::class,'profit_bonus'])->name('profit-bonus-history')->middleware('auth');
Route::get('/home/club_bonus_history/{id}', [FrontendController::class,'club_bonus'])->name('club-bonus-history')->middleware('auth');
Route::post('/user/dashboard/transfer-money', [AddMoneyController::class,'moneyTransfer'])->name('money-transfer')->middleware('auth');
Route::get('/home/transfer-report/{id}', [FrontendController::class,'transferReport'])->name('transfer-report')->middleware('auth');
Route::get('/home/my-team/{id}', [FrontendController::class,'MyTeam'])->name('my-team')->middleware('auth');
Route::get('/home/user-profile/{id}', [FrontendController::class,'Profile'])->name('my-profile')->middleware('auth');
Route::post('/home/user_profile_update/update', [ReferralController::class,'UpdateUser'])->name('user-profile-update')->middleware('auth');
Route::post('/home/user-password/change-password-store',[ReferralController::class,'changePassStore'])->name('change-password-store')->middleware('auth');

// User Payment Method
Route::get('/home/payment-method/{id}', [UserPaymentMethodController::class,'index'])->name('user-payment-method')->middleware('auth');
Route::post('/home/payment-method/store', [UserPaymentMethodController::class,'Store'])->name('user-payment-method-store')->middleware('auth');
Route::get('/home/payment-method/delete/{id}', [UserPaymentMethodController::class,'Delete'])->middleware('auth');
Route::post('/home/payment-method/update', [UserPaymentMethodController::class,'Update'])->name('user-payment-method-update')->middleware('auth');
Route::post('/user/dashboard/wallet-withdraw', [AddMoneyController::class,'walletWithdraw'])->name('wallet-withdraw')->middleware('auth');
//Route::post('/home/check-position', [RegistrationController::class,'checkPosition'])->name('referrals-checkposition');
Route::post('/home/check-position', [ReferralController::class,'checkPosition'])->name('referrals-checkposition');
Route::post('/home/get-sponsor', [ReferralController::class,'getSponsor'])->name('get-sponsor');
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
//admin withdraw request
Route::get('/admin/withdraw-money/requests', [AdminShowPaymentController::class,'WithdrawManage'])->name('withdraw-manage')->middleware('authadmin');
Route::get('/admin/withdraw-money-approve/{id}', [AdminShowPaymentController::class,'Withdrawapprove'])->middleware('authadmin');
Route::get('/admin/withdraw-money-delete/{id}', [AdminShowPaymentController::class,'Withdrawdestroy'])->middleware('authadmin');

Route::get('/admin/club_member/manage', [ClubController::class,'index'])->name('club-member-manage')->middleware('authadmin');


Route::get('/admin/manage-settings', [SettingsController::class,'Manage'])->name('settings-manage')->middleware('authadmin');
Route::post('/admin/manage-settings/store', [SettingsController::class,'StoreSettings'])->name('store-system-settings')->middleware('authadmin');
Route::post('/admin/manage-settings/update', [SettingsController::class,'UpdateSettings'])->name('system-update')->middleware('authadmin');

Route::post('/admin/club-bonus/store', [ClubController::class,'ClubBonus'])->name('club-bonus-store')->middleware('authadmin');
