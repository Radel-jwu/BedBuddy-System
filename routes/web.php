<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NinjaController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AuthController;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/signup/store', [SignupController::class, 'store'])->name('signup.store');
    


Route::get('/ninjas', [NinjaController::class, 'index'])->name('ninjas.index');
Route::get('/ninjas/create', [NinjaController::class, 'create'])->name('ninjas.create');   
Route::get('/ninjas/{ninja}' , [NinjaController::class, 'show'])->name('ninjas.show');
Route::post('/ninjas' , [NinjaController::class, 'store'])->name('ninjas.store');
Route::delete('/ninjas/{ninja}' , [NinjaController::class, 'destroy'])->name('ninjas.destroy');
