<?php

use App\Http\Controllers\addfund\AddFund;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\tables\Basic as TablesBasic;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\contactus\ContactUs;
use App\Http\Controllers\gamelist\GameList;
use App\Http\Controllers\getintouch\GetInTouch;
use App\Http\Controllers\reports\Reports;
use App\Http\Controllers\usermanagement\UserManagement;

Route::get('/', function () {
  return redirect()->route('auth-login');
});

// Guest Routes (Unauthenticated users)
Route::group(['middleware' => 'guest'], function () {
  Route::get('/auth/login', [LoginBasic::class, 'index'])->name('auth-login');
  Route::post('/auth/login', [LoginBasic::class, 'login'])->name('login');
  Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
  Route::post('/auth/register-basic', [RegisterBasic::class, 'register'])->name('register-basic');
});

// Authenticated Routes
Route::group(['middleware' => 'auth'], function () {

  // Dashboard and other pages
  Route::get('/dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');
  Route::get('/user-management', [UserManagement::class, 'index'])->name('user-management');
  Route::get('/game-list', [GameList::class, 'index'])->name('game-list');
  Route::get('/game-rate', [GameList::class, 'gamerate'])->name('game-rate');
  Route::get('/game-rate-add', [GameList::class, 'gamerateadd'])->name('game-rate-add');
  Route::get('/game-add', [GameList::class, 'creategame'])->name('game-add');
  Route::post('game-store', [GameList::class, 'storegame'])->name('game-store');
  Route::post('/add-wallet', [AddFund::class, 'storeaddfund'])->name('addwallet.store');
  Route::post('/withdraw', [AddFund::class, 'storewithdraw'])->name('withdraw.store');
  Route::get('/qr-code', [AddFund::class, 'qrcode'])->name('qr-code');


  Route::get('/contactus', [ContactUs::class, 'index'])->name('contactus');
  Route::post('/contact-us', [ContactUs::class, 'store'])->name('contactus.store');

  // Fund management
  Route::get('/add-fund', [AddFund::class, 'index'])->name('add-fund');
  Route::get('/add-fund-store', [AddFund::class, 'storeaddfund'])->name('add-fund-store');
  Route::get('/transaction-history', [Reports::class, 'index'])->name('transaction-history');
  Route::get('/bit-history', [Reports::class, 'bithistory'])->name('bit-history');
  Route::get('/deposit-history', [Reports::class, 'diposithistory'])->name('deposit-history');
  Route::get('/withdraw-history', [Reports::class, 'withdrawhistory'])->name('withdraw-history');
  Route::get('/withdraw-fund', [AddFund::class, 'withdraw'])->name('withdraw-fund');
  // Contact Us Video related routes
  Route::get('/add-video', [ContactUs::class, 'addvideo'])->name('add-video');
  Route::get('/add-wallet-video', [ContactUs::class, 'adddwalletvideo'])->name('add-wallet-video');
  Route::get('/contact-us/create', [ContactUs::class, 'create'])->name('contact.create');
  // Play Video related routes
  Route::get('/create-play-video', [ContactUs::class, 'createplayvideo'])->name('playvideo.create');
  Route::post('/store-play-video', [ContactUs::class, 'storeplayvideo'])->name('storeplayvideo');  // POST for storing play video
  // Wallet Video creation route
  Route::get('/create-wallet-video', [ContactUs::class, 'createwalletvideo'])->name('create-wallet-video');
  Route::post('/create-wallet-video', [ContactUs::class, 'store'])->name('store-wallet-video');
  Route::post('/create-wallet-video', [ContactUs::class, 'store'])->name('store-wallet-video');
  // Game Chart
  Route::post('/create-game-chart', [ContactUs::class, 'creategamechart'])->name('creategamechart');
  Route::get('/game-chart', [GameList::class, 'gamechart'])->name('game-chart');
  Route::post('/game-chart-store', [GameList::class, 'gamechartstore'])->name('game-chart-store');
  Route::get('/game-chart-create', [GameList::class, 'gamechartcreate'])->name('game-chart-create');
  // Tables and logout
  Route::delete('/game-chart/{id}', [GameList::class, 'destroy'])->name('game-chart-destroy');

  Route::get('/tables/basic', [TablesBasic::class, 'index'])->name('tables-basic');
  Route::post('/auth/logout', [LoginBasic::class, 'logout'])->name('logout');
});
