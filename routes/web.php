<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\customer\AuthController;
use App\Http\Controllers\customer\BookController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\MainPageController;
use App\Http\Controllers\customer\SiteSettingsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', [Controller::class, 'test']);

Route::get('/', [MainPageController::class, 'index'])->name('index');
Route::view('/login', 'login')->name('login-page');
Route::view('/register', 'register')->name('register-page');
Route::get('logout', [AuthController::class, 'logout'])->middleware('web')->name('logout');

Route::name('customer.')->group(function () {
    Route::post('/doLogin', [AuthController::class, 'login'])->name('doLogin');
    Route::post('/doRegister', [AuthController::class, 'register'])->name('doRegister');
    Route::get('/user-details', [AuthController::class, 'userDetails'])->middleware('redirectUserDetails')->name('userDetails');
    Route::post('/edit-user-details', [AuthController::class, 'editUserDetails'])->name('editUserDetails');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('show.book');
    Route::get('/books', [BookController::class, 'index'])->name('index.books');
    Route::post('/books/search', [BookController::class, 'search'])->name('books.search');
    Route::get('/contact', [SiteSettingsController::class, 'contactPage'])->name('contact');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::view('/about', 'about')->name('about');
});
