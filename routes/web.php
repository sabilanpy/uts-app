<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenyimpananController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProfileController;

// Route for login page
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route for registration page
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route for logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Middleware group to protect routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard'); // Pastikan nama view sesuai dengan nama file blade
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile/change-avatar', [ProfileController::class, 'updateAvatar'])->name('profile.change-avatar');

    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    // Penyimpanan
    Route::get('penyimpanan', [PenyimpananController::class, 'index'])->name('penyimpanan.index');
    Route::get('penyimpanan/create', [PenyimpananController::class, 'create'])->name('penyimpanan.create');
    Route::post('penyimpanan', [PenyimpananController::class, 'store'])->name('penyimpanan.store');
    Route::get('penyimpanan/{id}', [PenyimpananController::class, 'show'])->name('penyimpanan.show');
    Route::get('penyimpanan/{id}/edit', [PenyimpananController::class, 'edit'])->name('penyimpanan.edit');
    Route::put('penyimpanan/{id}', [PenyimpananController::class, 'update'])->name('penyimpanan.update');
    Route::delete('penyimpanan/{id}', [PenyimpananController::class, 'destroy'])->name('penyimpanan.destroy');
    //Penjualan
    Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::get('penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::post('penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::get('penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
    Route::get('penjualan/{id}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
    Route::put('penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

});


Route::get('/', function () {
    return redirect()->route('login');
});
