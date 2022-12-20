<?php

use App\Http\Controllers\DashboardController;
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

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
});
