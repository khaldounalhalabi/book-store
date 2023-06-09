<?php

use App\Http\Controllers\admin\BookController as AdminBookController;
use App\Http\Controllers\admin\EmailController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\SiteContentController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\customer\AuthController;
use App\Http\Controllers\customer\BookController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\ContactController;
use App\Http\Controllers\customer\DeliveryDetails;
use App\Http\Controllers\customer\LikeController;
use App\Http\Controllers\customer\MainPageController;
use App\Http\Controllers\customer\OrderController;
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

Route::view('/login', 'customer.login')->name('login-page');
Route::view('/register', 'customer.register')->name('register-page');
Route::get('logout', [AuthController::class, 'logout'])->middleware('web')->name('logout');
Route::get('/', [MainPageController::class, 'index'])->name('index');

Route::name('customer.')->group(function () {
    Route::post('/doLogin', [AuthController::class, 'login'])->name('doLogin');
    Route::post('/doRegister', [AuthController::class, 'register'])->name('doRegister');
    Route::get('/user-details', [AuthController::class, 'userDetails'])->middleware('redirectUserDetails')->name('userDetails');
    Route::post('/edit-user-details', [AuthController::class, 'editUserDetails'])->name('editUserDetails');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('show.book');
    Route::get('/books', [BookController::class, 'index'])->name('index.books');
    Route::post('/books/search', [BookController::class, 'search'])->name('books.search');
    Route::get('/contact', [ContactController::class, 'contactPage'])->name('contact');
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::view('/about', 'customer.about')->name('about');
    Route::post('/messages/send', [ContactController::class, 'send'])->name('messages.send');
    Route::post('/{book_id}/like', [LikeController::class, 'like'])->name('like');


    Route::get('delivery-details/{book_id?}', [DeliveryDetails::class , 'deliveryDetailsPage'])->name('delivery-details');
    Route::get('/make-order/{book_id?}', [OrderController::class, 'order'])->name('make-order');
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('index');
    Route::get('/books-table', [AdminBookController::class, 'data'])->name('books.table');
    Route::resource('/books', AdminBookController::class)->names('books');
    Route::get('/site-content', [SiteContentController::class, 'edit'])->name('site_content.edit');
    Route::put('/site-content/update', [SiteContentController::class, 'update'])->name('site_content.update');
    Route::get('/emails', [EmailController::class, 'index'])->name('email.index');
    Route::get('/emails/{id}', [EmailController::class, 'show'])->name('email.show');
});
