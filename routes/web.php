<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Route::get('/signup/role', function () {
    return view('signup_page.choose_role');
});

Route::get('/signup', function () {
    return view('signup_page.register');
});

Route::get('/signup/verification', function () {
    return view('signup_page.acc_verification');
})->name('signup.verification');

Route::get('/login', function () {
    return view('login_page.login');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
});

Route::get('/dashboard/social', function () {
    return view('dashboard.social');
})->name('dashboard.social');

Route::get('/dashboard/socials', function () {
    return view('dashboard.socials');
})->name('dashboard.socials');

Route::get('/dashboard/view', function () {
    return view('dashboard.viewmore');
})->name('dashboard.view');

Route::get('/dashboard/viewlisting', function () {
    return view('dashboard.view_listing');
})->name('dashboard.listing');

Route::get('/dashboard/billing-history', function () {
    return view('dashboard.billing-history');
})->name('dashboard.billing-history');

Route::get('/dashboard/about-us', function () {
    return view('dashboard.about-us');
})->name('dashboard.about-us');

Route::get('/dashboard/subscription-plan', function () {
    return view('dashboard.subscription-plan');
})->name('dashboard.subscription-plan');

Route::get('/dashboard/profile-settings', [ProfileController::class, 'edit'])->name('dashboard.profile-settings');

Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/signup/store', [SignupController::class, 'store'])->name('signup.store');
    
Route::post('/logout', function () {
    Auth::logout();              // Logout the user
    request()->session()->invalidate();  // Invalidate the session
    request()->session()->regenerateToken(); // Regenerate CSRF token
    return redirect('/login');   // Redirect to login page
})->name('logout');



Route::get('/ninjas', [NinjaController::class, 'index'])->name('ninjas.index');
Route::get('/ninjas/create', [NinjaController::class, 'create'])->name('ninjas.create');   
Route::get('/ninjas/{ninja}' , [NinjaController::class, 'show'])->name('ninjas.show');
Route::post('/ninjas' , [NinjaController::class, 'store'])->name('ninjas.store');
Route::delete('/ninjas/{ninja}' , [NinjaController::class, 'destroy'])->name('ninjas.destroy');
