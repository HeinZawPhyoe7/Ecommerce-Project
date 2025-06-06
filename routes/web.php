<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('/admin/view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin']);

Route::post('/admin/add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);

Route::get('/admin/delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);
