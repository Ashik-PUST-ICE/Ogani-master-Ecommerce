<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'user']);
// Registration routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    // User dashboard
    Route::get('/dashboard', [HomeController::class, 'login_user'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::get('/shop', [HomeController::class, 'shop'])
    ->middleware(['auth', 'verified']);

    // Admin dashboard
    // Route::get('admin/dashboard', [HomeController::class, 'index'])
    //     ->middleware('admin')
    //     ->name('admin.dashboard');

    // Profile management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('admin/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'admin']);


Route::get('view_category', [AdminController::class, 'view_category'])
    ->middleware(['auth', 'admin']);

Route::post('add_category', [AdminController::class, 'add_category'])
    ->middleware(['auth', 'admin']);

Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])
    ->middleware(['auth', 'admin']);

Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])
    ->middleware(['auth', 'admin']);

 Route::post('update_category/{id}', [AdminController::class, 'update_category'])
    ->middleware(['auth', 'admin']);


Route::get('add_product', [AdminController::class, 'add_product'])
    ->middleware(['auth', 'admin']);


Route::post('upload_product', [AdminController::class, 'upload_product'])
->middleware(['auth', 'admin']);


Route::get('view_product', [AdminController::class, 'view_product'])
    ->middleware(['auth', 'admin']);

    Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])
    ->middleware(['auth', 'admin']);

    Route::get('update_product/{id}', [AdminController::class, 'update_product'])
    ->middleware(['auth', 'admin']);

    Route::post('edit_product/{id}', [AdminController::class, 'edit_product'])
    ->middleware(['auth', 'admin']);

    Route::get('product_search', [AdminController::class, 'product_search'])
    ->middleware(['auth', 'admin']);





require __DIR__.'/auth.php';
