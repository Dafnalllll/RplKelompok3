<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return view('pages.user.about');
})->middleware(['auth', 'verified'])->name('about');

Route::get('/ourteam', function () {
    return view('pages.user.ourteam');
})->middleware(['auth', 'verified'])->name('ourteam');

Route::get('/contact', function () {
    return view('pages.user.contact');
})->middleware(['auth', 'verified'])->name('contact');

Route::get('/faq', function () {
    return view('pages.user.faq');
})->middleware(['auth', 'verified'])->name('faq');

Route::get('/howtopayment', function () {
    return view('pages.user.howtopayment');
})->middleware(['auth', 'verified'])->name('payment');

Route::get('/dashboardadmin', function () {
    return view('pages.admin.dashboardadmin');
})->name('dashboardadmin');

Route::get('/ordermanage', function () {
    return view('pages.admin.ordermanage');
})->name('ordermanage');

Route::get('/productmanage', function () {
    return view('pages.admin.productmanage');
})->name('productmanage');

Route::get('/analytics', function () {
    return view('pages.admin.analytics');
})->name('analytics');

Route::get('/categorymanage', function () {
    return view('pages.admin.categorymanage');
})->name('categorymanage');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    return view('pages.notfound');
});
require __DIR__.'/auth.php';
