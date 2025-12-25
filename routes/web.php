<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
| Hammaga ochiq bo'lgan sahifalar
*/
Route::get('/', [JobPostController::class, 'index'])->name('jobs.index');

// Bitta ishni ko'rish — hammaga ochiq
Route::get('/jobs/{job}', [JobPostController::class, 'show'])
     ->name('jobs.show')
     ->where('job', '[0-9]+');  // faqat raqamli ID

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
| Faqat login qilgan foydalanuvchilar uchun
*/
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])
         ->name('dashboard');

    // Ish joylash (Employer)
    
             Route::get('jobs/create', [JobPostController::class, 'create'])->name('jobs.create');

    Route::post('/jobs', [JobPostController::class, 'store'])
         ->name('jobs.store');

    // Ariza topshirish (Job seeker)
    Route::post('/jobs/{job}/apply', [ApplicationController::class, 'store'])
         ->name('applications.store');

    // Suhbatlar (Chat)
    Route::get('/messages', [MessageController::class, 'index'])
         ->name('messages.index');

    Route::get('/messages/{user}', [MessageController::class, 'show'])
         ->name('messages.show');  // {userId} emas, {user} — model binding uchun qulayroq

    Route::post('/messages', [MessageController::class, 'store'])
         ->name('messages.store');

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])
         ->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])
         ->name('profile.update');
});

// Laravel Breeze/Jetstream yoki boshqa auth routelari
require __DIR__.'/auth.php';