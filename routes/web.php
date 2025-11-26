<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('welcome');
});

// User Routes
Route::middleware(['auth', 'verified', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/about', function () {
        return view('pages.user.about');
    })->name('about');

    Route::get('/motorcycle', function () {
        return view('pages.user.motorcycle');
    })->name('motorcycle');

    Route::get('/product', function () {
        return view('pages.user.product');
    })->name('product');

    Route::get('/ourteam', function () {
        return view('pages.user.ourteam');
    })->name('ourteam');

    Route::get('/contact', function () {
        return view('pages.user.contact');
    })->name('contact');

    Route::get('/faq', function () {
        return view('pages.user.faq');
    })->name('faq');

    Route::get('/howtopayment', function () {
        return view('pages.user.howtopayment');
    })->name('payment');
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('pages.admin.dashboardadmin');
    })->name('dashboardadmin');

    Route::get('/ordermanage', function () {
        return view('pages.admin.ordermanage');
    })->name('ordermanage');

    Route::get('/productmanage', function () {
        return view('pages.admin.productmanage');
    })->name('productmanage');

    Route::get('/usermanage', function () {
        return view('pages.admin.usermanage');
    })->name('usermanage');

    Route::get('/analytics', function () {
        return view('pages.admin.analytics');
    })->name('analytics');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Fallback
Route::fallback(function () {
    return view('pages.notfound');
});

require __DIR__.'/auth.php';
