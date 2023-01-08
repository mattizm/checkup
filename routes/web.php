<?php

use App\Http\Controllers\DashboardController;
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
Route::get('/email/verify', function () {
  return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();

  return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();

  return back()->with('success', 'Verifikasi Email Telah Dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/', function () {
  return view('auth.login');
});

Route::prefix('/')->group(function () {
  Route::get('home', [DashboardController::class, 'dashboard'])->name('home');
  Route::get('biodata', [DashboardController::class, 'biodata'])->name('biodata');
  Route::get('about', [DashboardController::class, 'about'])->name('about');
  Route::get('faq', [DashboardController::class, 'faq'])->name('faq');
  Route::get('kontak', [DashboardController::class, 'kontak'])->name('kontak');
  Route::get('listpeserta', [DashboardController::class, 'listpeserta'])->name('listpeserta');
  Route::get('admin', [DashboardController::class, 'admin'])->name('admin');
  Route::get('wizard', [DashboardController::class, 'wizard'])->name('wizard');
});

Route::prefix('user')->group(function () {
  Route::get('create', [UserController::class, 'createuser'])->name('create.user');
  Route::post('save', [UserController::class, 'saveuser'])->name('save.user');
  Route::post('update', [UserController::class, 'updateuser'])->name('update.user');
});

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
});
