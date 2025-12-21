<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserManageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\ProductManageController;
use App\Http\Controllers\Admin\OrderManageController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\UserHistoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\OrderController;
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

    //Product
    Route::get('/product', [ProductController::class, 'index'])->name('user.product');
    Route::get('/product/rent/{id}', [ProductController::class, 'show']);
    Route::post('/order', [UserHistoryController::class, 'store'])->name('order.store');

    Route::get('/ourteam', function () {
        return view('pages.user.ourteam');
    })->name('ourteam');

    Route::get('/contact', function () {
        return view('pages.user.contact');
    })->name('contact');

    Route::get('/faq', [QuestionController::class, 'question'])->name('faq');

    Route::get('/howtopayment', function () {
        return view('pages.user.howtopayment');
    })->name('payment');

    Route::get('/history', [UserHistoryController::class, 'index'])->name('history');

});

// Admin Routes
Route::middleware(['auth',  'role:admin'])->group(function () {
    Route::get('/admin', [DashboardAdminController::class, 'index'])->name('dashboardadmin');

    // Order Management
    Route::get('/ordermanage', [OrderManageController::class, 'index'])->name('ordermanage');
    Route::post('/ordermanage/bulk-action', [OrderManageController::class, 'bulkAction'])->name('ordermanage.bulkAction');

    // Product Management
    Route::get('/productmanage', [ProductManageController::class, 'index'])->name('productmanage');
    Route::get('/admin/product/search', [ProductManageController::class, 'search'])->name('admin.product.search');
    Route::get('/productmanage/add', [ProductManageController::class, 'create'])->name('productmanage.add');
    Route::post('/productmanage', [ProductManageController::class, 'store'])->name('productmanage.store');
    Route::delete('/productmanage/{product}', [ProductManageController::class, 'destroy'])->name('productmanage.delete');
    Route::put('/productmanage/{product}', [ProductManageController::class, 'update'])->name('productmanage.update');


    // User Management
    Route::get('/usermanage', [UserManageController::class, 'index'])->name('usermanage');
    Route::post('/usermanage/bulk-action', [UserManageController::class, 'bulkAction'])->name('usermanage.bulkAction');
    Route::get('/admin/user/search', [UserManageController::class, 'search'])->name('admin.user.search');

    // FAQ Management
    Route::get('/questionmanage', [QuestionController::class, 'index'])->name('questionmanage');

    Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Question Store
Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
Route::post('/questions/{question}/answer', [QuestionAnswerController::class, 'store'])->name('questions.answer');

Route::middleware(['auth', 'role:user,admin'])->group(function () {
    Route::get('/order/{order}/upload-proof', [OrderController::class, 'showUploadProofForm'])->name('order.upload-proof');
    Route::post('/order/{order}/upload-proof', [OrderController::class, 'uploadProof'])->name('order.upload-proof.submit');
});


// Fallback
Route::fallback(function () {
    return view('pages.notfound');
});

require __DIR__.'/auth.php';
