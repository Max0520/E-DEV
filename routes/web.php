<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\NewsletterController;
// use App\Http\Controllers\PremiumController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::get('/', function () {
    return view('home');
});

// Services dynamiques
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

// Contact (public)
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Projets
Route::get('/projets', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projets/{id}', [ProjectController::class, 'show'])->name('projects.show');

// ✅ Premium (public)
// Route::get('/solutions-premium', [PremiumController::class, 'index'])->name('premium.index');
// Route::get('/solutions-premium/{id}', [PremiumController::class, 'show'])->name('premium.show');

/*
|--------------------------------------------------------------------------
| Admin / Back-office
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('auth')->group(function () {
    // Contacts
    Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::post('/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('admin.contacts.reply');

    // ✅ Endpoint JSON pour récupérer les réponses (AJAX auto-refresh)
    Route::get('/contacts/{contact}/replies', [ContactController::class, 'getReplies'])
        ->name('admin.contacts.replies');

    // Newsletter
    Route::post('/newsletter', [NewsletterController::class, 'store'])->name('newsletter.store');
});

/*
|--------------------------------------------------------------------------
| Auth (nécessaire pour Filament)
|--------------------------------------------------------------------------
*/
