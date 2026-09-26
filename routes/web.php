<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('home');

// About & Contact
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function () {
    return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
})->name('contact.submit');

// Auth
require __DIR__.'/auth.php';

// Customer View
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');

// Routes yang perlu login
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Menu
    Route::resource('menu', MenuController::class);
    
    // Orders
    Route::resource('orders', OrderController::class);
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    
    // Order Item - Quantity
    Route::patch('/order-item/{orderItem}/update-qty', [OrderController::class, 'updateQty'])->name('orders.update-qty');
    
    // Order Item - Add
    Route::get('/order/add-item/{menu}', [OrderController::class, 'addItem'])->name('orders.add-item');
    
    // Order Item - Remove
    Route::delete('/order-item/{orderItem}', [OrderController::class, 'removeItem'])->name('orders.remove-item');
    
    // Order - Cancel
    Route::post('/order/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
    
    // Order - Get Details (AJAX)
    Route::get('/order/{order}/details', [OrderController::class, 'getDetails'])->name('orders.details');
    Route::get('/order/active', [OrderController::class, 'getActive'])->name('orders.active');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Redirect /dashboard untuk customer
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user && ($user->role === 'admin' || $user->role === 'staff')) {
        return app(DashboardController::class)->index();
    }
    return redirect()->route('customer.index');
})->middleware('auth')->name('dashboard');