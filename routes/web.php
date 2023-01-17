<?php

use App\Http\Controllers\AnakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::prefix('data_ibu')->group(function () {
  Route::get('', [UserController::class, 'user'])->name('user');
  Route::get('show/{id}', [UserController::class, 'showuser'])->name('show.user');
  Route::get('create', [UserController::class, 'createuser'])->name('create.user');
  Route::post('save', [UserController::class, 'saveuser'])->name('save.user');
  Route::get('edit/{id}', [UserController::class, 'edituser'])->name('edit.user');
  Route::post('update/{id}', [UserController::class, 'updateuser'])->name('update.user');
});

Route::prefix('client')->group(function () {
  Route::get('', [UserController::class, 'client'])->name('client');
  Route::get('edit', [UserController::class, 'editclient'])->name('edit.client');
  Route::post('update', [UserController::class, 'updateclient'])->name('update.client');

  Route::get('/lihatanak/{id}', [AnakController::class, 'lihatanak'])->name('lihatanak');
  Route::get('/anak', [AnakController::class, 'anak'])->name('anak');
  Route::get('/anak/create', [AnakController::class, 'createanak'])->name('create.anak');
  Route::post('anak/save', [AnakController::class, 'saveanak'])->name('save.anak');
  Route::get('anak/edit', [AnakController::class, 'editanak'])->name('edit.anak');
  Route::post('anak/update', [AnakController::class, 'updateanak'])->name('update.anak');
});
Route::get('pengaturan', [PengaturanController::class, 'pengaturan'])->name('pengaturan');
Route::post('pengaturan', [PengaturanController::class, 'pengaturanupdate'])->name('pengaturanupdate');

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified'
])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
});
