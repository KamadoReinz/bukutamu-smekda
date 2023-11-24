<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BulananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\TamuController;
use App\Http\Controllers\Admin\AdminTamuController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Petugas\PetugasTamuController;

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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('login', function () {
//     return view('login');
// });

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'AuthLogin'])->name('AuthLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'forgotpassword'])->name('forgot.password');
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword'])->name('post.forgot.password');
Route::get('reset/{token}', [AuthController::class, 'reset'])->name('reset');
Route::post('reset/{token}', [AuthController::class, 'PostReset'])->name('post.reset');

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/user/list', [AdminController::class, 'list'])->name('user.list');
    Route::post('admin/user/add', [AdminController::class, 'insert'])->name('user.insert');
    Route::post('admin/user/edit/{id}', [AdminController::class, 'update']);
    Route::get('admin/user/delete/{id}', [AdminController::class, 'delete'])->name('user.delete');

    Route::get('admin/tamu/list', [AdminTamuController::class, 'list'])->name('tamu.list');
});

Route::group(['middleware' => 'petugas'], function () {
    Route::get('petugas/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('petugas/tamu/list', [PetugasTamuController::class, 'list'])->name('petugas.tamu.list');
    Route::post('petugas/tamu/add', [PetugasTamuController::class, 'insert'])->name('tamu.insert');
    Route::post('petugas/tamu/edit/{id}', [PetugasTamuController::class, 'update']);
    Route::get('petugas/tamu/delete/{id}', [PetugasTamuController::class, 'delete'])->name('tamu.delete');
});

// Laporan Bulanan & Cetak
Route::get('bulanan', [BulananController::class, 'list'])->name('bulanan.list');
Route::get('bulanan/detail/{bulan}', [BulananController::class, 'show'])->name('bulanan.show');
Route::get('bulanan/cetak/{bulan}', [BulananController::class, 'cetak'])->name('bulanan.cetak');

Route::post('simpan-tamu', [TamuController::class, 'simpanTamu'])->name('simpan-tamu');
