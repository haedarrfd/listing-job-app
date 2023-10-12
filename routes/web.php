<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardListingController;
use App\Http\Controllers\RegisterController;

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

// Halaman Utama Listing
Route::get('/listings', [ListingController::class, 'index'])->name('home');
// Halaman Single Listing
Route::get('/listings/{listing:slug}', [ListingController::class, 'show'])->name('listing.show');
// Halaman Categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
// Halaman Register
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
// Halaman Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/auth', [LoginController::class, 'authenticate'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
// Halaman Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard Page'
    ]);
})->name('dashboard')->middleware('auth');

Route::resource('/dashboard/listings', DashboardListingController::class)->names([
    'index' => 'dashboard.listings.index',
    'create' => 'dashboard.listings.create',
    'store' => 'dashboard.listings.store',
    'update' => 'dashboard.listings.update',
    'destroy' => 'dashboard.listings.destroy',
])->middleware('auth');
Route::get('dashboard/listings/{listing:slug}', [DashboardListingController::class, 'show'])->name('dashboard.listings.show')->middleware('auth');
Route::get('/dashboard/listings/{listing:slug}/edit', [DashboardListingController::class, 'edit'])->name('dashboard.listings.edit')->middleware('auth');
