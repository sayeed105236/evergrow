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
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BuyUnitController;

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

//package activation
Route::get('/home/activation-package/{id}', [HomeController::class,'Activate'])->name('activation')->middleware('auth');
Route::post('/home/activate-package/', [HomeController::class,'ActivatePackage'])->name('activate-package')->middleware('auth');



//unit buy
Route::post('/home/user-buy-unit/', [BuyUnitController::class,'buy_unit'])->name('buy-unit')->middleware('auth');
Route::get('/home/user-buy-unit/{id}', [BuyUnitController::class,'index'])->name('user-unit-buy')->middleware('auth');


//user history
Route::get('/home/sponsor_bonus_history/{id}', [FrontendController::class,'sponsor_bonus'])->name('sponsor-bonus-history')->middleware('auth');
Route::get('/home/binary_bonus_history/{id}', [FrontendController::class,'pair_bonus'])->name('pair-bonus-history')->middleware('auth');
Route::get('/home/profit_bonus_history/{id}', [FrontendController::class,'profit_bonus'])->name('profit-bonus-history')->middleware('auth');
Route::get('/home/rank_bonus_history/{id}', [FrontendController::class,'rank_bonus'])->name('rank-bonus-history')->middleware('auth');
Route::get('/home/club_bonus_history/{id}', [FrontendController::class,'club_bonus'])->name('club-bonus-history')->middleware('auth');
Route::get('/home/unit_bonus_history/{id}', [FrontendController::class,'unit_bonus'])->name('unit-bonus-history')->middleware('auth');
Route::post('/user/dashboard/transfer-money', [AddMoneyController::class,'moneyTransfer'])->name('money-transfer')->middleware('auth');
Route::get('/home/transfer-report/{id}', [FrontendController::class,'transferReport'])->name('transfer-report')->middleware('auth');
Route::get('/home/withdraw-report/{id}', [FrontendController::class,'withdrawReport'])->name('withdraw-report')->middleware('auth');
Route::get('/home/unit-buy-report/{id}', [FrontendController::class,'UnitBuyReport'])->name('unit-buy-report')->middleware('auth');


//user team
Route::get('/home/my-team/{id}', [FrontendController::class,'MyTeam'])->name('my-team')->middleware('auth');

//user_profile
Route::get('/home/user-profile/{id}', [FrontendController::class,'Profile'])->name('my-profile')->middleware('auth');
Route::post('/home/user_profile_update/update', [ReferralController::class,'UpdateUser'])->name('user-profile-update')->middleware('auth');
Route::post('/home/user-password/change-password-store',[ReferralController::class,'changePassStore'])->name('change-password-store')->middleware('auth');
Route::get('/home/user-rank/{id}', [FrontendController::class,'UserRank'])->name('user-rank')->middleware('auth');



//rank
Route::post('/home/claim-rank/silver', [HomeController::class,'SilverRank'])->name('claim-silver')->middleware('auth');
Route::post('/home/claim-rank/bronze', [HomeController::class,'BronzeRank'])->name('claim-bronze')->middleware('auth');
Route::post('/home/claim-rank/gold', [HomeController::class,'GoldRank'])->name('claim-gold')->middleware('auth');
Route::post('/home/claim-rank/platinum', [HomeController::class,'PlatinumRank'])->name('claim-platinum')->middleware('auth');
// User Payment Method
Route::get('/home/payment-method/{id}', [UserPaymentMethodController::class,'index'])->name('user-payment-method')->middleware('auth');
Route::post('/home/payment-method/store', [UserPaymentMethodController::class,'Store'])->name('user-payment-method-store')->middleware('auth');
Route::get('/home/payment-method/delete/{id}', [UserPaymentMethodController::class,'Delete'])->middleware('auth');
Route::post('/home/payment-method/update', [UserPaymentMethodController::class,'Update'])->name('user-payment-method-update')->middleware('auth');
Route::post('/user/dashboard/wallet-withdraw', [AddMoneyController::class,'walletWithdraw'])->name('wallet-withdraw')->middleware('auth');
//Route::post('/home/check-position', [RegistrationController::class,'checkPosition'])->name('referrals-checkposition');
Route::post('/home/check-position', [ReferralController::class,'checkPosition'])->name('referrals-checkposition');
Route::post('/home/get-sponsor', [ReferralController::class,'getSponsor'])->name('get-sponsor');
Route::post('/home/get-user', [AddMoneyController::class,'getUser'])->name('get-user');

Route::middleware(['auth:sanctum', 'verified'])->get('/user/dashboard/', function () {
    return view('user.home');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified','authadmin'])->get('/admin/dashboard', function () {
    return view('admin.home');
})->name('admin.pages.dashboard');
//admin routes
Route::get('/admin/user_lists', [UserListController::class,'Manage'])->name('user-list')->middleware('authadmin');
Route::post('/home/user-password/reset',[ReferralController::class,'changePassword'])->name('reset-password')->middleware('authadmin');
//Admin Payment method Routes
Route::get('/admin/payment-method', [PaymentMethodController::class,'index'])->name('payment-method')->middleware('authadmin');
Route::post('/admin/payment-method/store', [PaymentMethodController::class,'Store'])->name('payment-method-store')->middleware('authadmin');
Route::get('/admin/payment-method/delete/{id}', [PaymentMethodController::class,'Delete'])->middleware('authadmin');
Route::post('/admin/payment-method/update', [PaymentMethodController::class,'Update'])->name('payment-method-update')->middleware('authadmin');
Route::get('/admin/add-money/requests', [AdminShowPaymentController::class,'Manage'])->name('deposit-manage')->middleware('authadmin');
Route::get('/admin/add-money-approve/{id}', [AdminShowPaymentController::class,'approve'])->middleware('authadmin');
Route::get('/admin/add-money-reject/{id}/{user_id}/{amount}', [AdminShowPaymentController::class,'rejected'])->middleware('authadmin');
Route::get('/admin/add-money-delete/{id}', [AdminShowPaymentController::class,'destroy'])->middleware('authadmin');
//admin withdraw request
Route::get('/admin/withdraw-money/requests', [AdminShowPaymentController::class,'WithdrawManage'])->name('withdraw-manage')->middleware('authadmin');
Route::get('/admin/withdraw-money-approve/{id}', [AdminShowPaymentController::class,'Withdrawapprove'])->middleware('authadmin');
Route::get('/admin/withdraw-money-delete/{id}', [AdminShowPaymentController::class,'Withdrawdestroy'])->middleware('authadmin');

Route::get('/admin/club_member/manage', [ClubController::class,'index'])->name('club-member-manage')->middleware('authadmin');
Route::get('/admin/profit_share/manage', [ClubController::class,'Profit'])->name('profit-share-manage')->middleware('authadmin');

// admin manage settings
Route::get('/admin/manage-settings', [SettingsController::class,'Manage'])->name('settings-manage')->middleware('authadmin');
Route::post('/admin/manage-settings/store', [SettingsController::class,'StoreSettings'])->name('store-system-settings')->middleware('authadmin');
Route::post('/admin/manage-settings/update', [SettingsController::class,'UpdateSettings'])->name('system-update')->middleware('authadmin');

//club bonus
Route::post('/admin/club-bonus/store', [ClubController::class,'ClubBonus'])->name('club-bonus-store')->middleware('authadmin');
Route::post('/admin/profit-share/store', [ClubController::class,'ProfitShare'])->name('profit-share-store')->middleware('authadmin');

//balance Adjust
Route::get('/admin/balance-adjust/manage', [AddMoneyController::class,'AdjustBalance'])->name('balance-adjust')->middleware('authadmin');
Route::post('/admin/balance-adjust/store', [AddMoneyController::class,'AdjustBalanceStore'])->name('store-adjust')->middleware('authadmin');

//admin transaction history

Route::get('/admin/manage/pair-bonus-history', [ReportController::class,'Manage'])->name('manage-pair-history')->middleware('authadmin');
Route::get('/admin/manage/rank-bonus-history', [ReportController::class,'ManageRank'])->name('manage-rank-history')->middleware('authadmin');
Route::get('/admin/manage/club-bonus-history', [ReportController::class,'ManageClub'])->name('manage-club-history')->middleware('authadmin');
Route::get('/admin/manage/sponsor-bonus-history', [ReportController::class,'ManageSponsor'])->name('manage-sponsor-history')->middleware('authadmin');
Route::get('/admin/manage/profit-bonus-history', [ReportController::class,'ManageProfit'])->name('manage-profit-history')->middleware('authadmin');
Route::get('/admin/manage/transfer-history', [ReportController::class,'ManageTransfer'])->name('manage-transfer-history')->middleware('authadmin');
Route::get('/admin/manage/unit-bonus-history', [ReportController::class,'ManageUnit'])->name('manage-unit-history')->middleware('authadmin');
Route::get('/admin/manage/unit-purchase-history', [ReportController::class,'ManageUnitPurchase'])->name('manage-unit-purchase-history')->middleware('authadmin');
Route::get('/admin/manage/unit', [ReportController::class,'ManageUnitLevel'])->name('manage-unit')->middleware('authadmin');
