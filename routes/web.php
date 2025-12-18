<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Agent\DashboardController as AgentDashboardController;
use Illuminate\Support\Facades\Auth;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/properties', [HomeController::class, 'properties'])->name('properties.index');
Route::get('/property/{slug}', [HomeController::class, 'showProperty'])->name('property.show');
Route::post('/property/message', [HomeController::class, 'sendMessage'])->name('property.message')->middleware('auth');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [HomeController::class, 'showPost'])->name('blog.show');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send')->middleware('auth');

Auth::routes();

// Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('agents', \App\Http\Controllers\Admin\AgentController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::get('properties', [\App\Http\Controllers\Admin\PropertyController::class, 'index'])->name('properties.index');
    Route::put('properties/{id}/approve', [\App\Http\Controllers\Admin\PropertyController::class, 'approve'])->name('properties.approve');
    Route::delete('properties/{id}', [\App\Http\Controllers\Admin\PropertyController::class, 'destroy'])->name('properties.destroy');
});

// Agent Routes
Route::group(['prefix' => 'agent', 'as' => 'agent.', 'middleware' => ['auth', 'role:agent']], function () {
    Route::get('/dashboard', [AgentDashboardController::class, 'index'])->name('dashboard');
    Route::resource('properties', \App\Http\Controllers\Agent\PropertyController::class);
    
    // Profile
    Route::get('profile', [\App\Http\Controllers\Agent\ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [\App\Http\Controllers\Agent\ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/password', [\App\Http\Controllers\Agent\ProfileController::class, 'updatePassword'])->name('profile.password');

    // Messages
    Route::get('messages', [\App\Http\Controllers\Agent\MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{id}', [\App\Http\Controllers\Agent\MessageController::class, 'read'])->name('messages.read');
    Route::delete('messages/{id}', [\App\Http\Controllers\Agent\MessageController::class, 'destroy'])->name('messages.destroy');
});
