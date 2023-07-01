<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BookController as AdminBookController;
use App\Http\Controllers\admin\EmailController;
use App\Http\Controllers\admin\IndexController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\PayPalController;
use App\Http\Controllers\admin\ShippingController;
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
use App\Http\Controllers\customer\SendInvoiceEmail;
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


Route::view('/login', 'customer.login')->name('login-page');
Route::view('/register', 'customer.register')->name('register-page');
Route::get('logout', [AuthController::class, 'logout'])->middleware('login-required')->name('logout');
Route::get('/', [MainPageController::class, 'index'])->name('index');
Route::view('admin/login', 'admin.login')->name('admin.login-page');
Route::post('admin/do-login' , [AdminController::class , 'login'])->name('admin.do-login');

Route::name('customer.')->group(function () {
    Route::post('/doLogin', [AuthController::class, 'login'])->name('doLogin');
    Route::post('/doRegister', [AuthController::class, 'register'])->name('doRegister');
    Route::get('/user-details', [AuthController::class, 'userDetails'])->middleware('login-required')->name('userDetails');
    Route::post('/edit-user-details', [AuthController::class, 'editUserDetails'])->middleware('login-required')->name('editUserDetails');
    Route::get('/books/{id}', [BookController::class, 'show'])->name('show.book');
    Route::get('/books', [BookController::class, 'index'])->name('index.books');
    Route::post('/books/search', [BookController::class, 'search'])->name('books.search');
    Route::get('/contact', [ContactController::class, 'contactPage'])->name('contact');
    Route::view('/terms-conditions', 'customer.terms-conditions')->name('terms-conditions');
    Route::get('/cart', [CartController::class, 'index'])->middleware('login-required')->name('cart');
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->middleware('login-required')->name('cart.add');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->middleware('login-required')->name('cart.remove');
    Route::view('/about', 'customer.about')->name('about');
    Route::post('/messages/send', [ContactController::class, 'send'])->name('messages.send');
    Route::post('/{book_id}/like', [LikeController::class, 'like'])->middleware('login-required')->name('like');
    Route::get('delivery-details/{book_id?}', [DeliveryDetails::class, 'deliveryDetailsPage'])->name('delivery-details');
    Route::post('/make-order/{book_id?}', [OrderController::class, 'order'])->name('make-order');
    Route::get('send-invoice-email', [SendInvoiceEmail::class, 'send'])->name('email-invoice-send');
});
Route::name('admin.')->prefix('admin')->middleware('dashboard-middleware')->group(function () {
    Route::get('/dashboard', [IndexController::class, 'index'])->name('index');
    Route::get('/books-table', [AdminBookController::class, 'data'])->name('books.table');
    Route::resource('/books', AdminBookController::class)->names('books');
    Route::get('/site-content', [SiteContentController::class, 'edit'])->name('site_content.edit');
    Route::put('/site-content/update', [SiteContentController::class, 'update'])->name('site_content.update');
    Route::get('/emails/data' , [EmailController::class , 'data'])->name('email.data');
    Route::get('/emails', [EmailController::class, 'index'])->name('email.index');
    Route::get('/emails/{id}', [EmailController::class, 'show'])->name('email.show');
    Route::get('/orders-table', [AdminOrderController::class, 'data'])->name('order.data');
    Route::get('/orders', [AdminOrderController::class , 'index'])->name('orders.index');
    Route::view('/orders/create', 'admin.orders.create')->name('orders.create');
    Route::get('/orders/show/{order_id}', [AdminOrderController::class, 'show'])->name('order.show');
    Route::get('orders/edit/{order_id}', [AdminOrderController::class, 'edit'])->name('order.edit');
    Route::post('/orders/update/{order_id}', [AdminOrderController::class, 'update'])->name('order.update');
    Route::delete('/orders/delete/{order_id}', [AdminOrderController::class, 'delete'])->name('order.delete');
    Route::get('/books-all', [AdminBookController::class, 'allBooks'])->name('book.books-all');
    Route::post('books/store', [AdminOrderController::class, 'create'])->name('store.order');
    Route::view('/shipping/create', 'admin.shipping.create')->name('shipping.create');
    Route::post('/shipping/store', [ShippingController::class, 'store'])->name('shipping.store');
    Route::get('shipping/data', [ShippingController::class, 'data'])->name('shipping.data');
    Route::view('shipping/index', 'admin.shipping.table')->name('shipping.index');
    Route::get('shipping/show/{shipping_id}', [ShippingController::class, 'show'])->name('shipping.show');
    Route::get('shipping/edit/{shipping_id}', [ShippingController::class, 'edit'])->name('shipping.edit');
    Route::post('shipping/update/{shipping_id}', [ShippingController::class, 'update'])->name('shipping.update');
    Route::get('admins/data', [AdminController::class, 'data'])->middleware('super-admin')->name('admins.data');
    Route::view('admins', 'admin.admins.admins')->middleware('super-admin')->name('admins');
    Route::view('admins/create', 'admin.admins.create')->middleware('super-admin')->name('admins.create');
    Route::post('admins/store', [AdminController::class, 'store'])->middleware('super-admin')->name('admin.store');
    Route::get('admin/logout' , [AdminController::class , 'logout'])->name('admin.logout');
});

Route::get('/get-countries', [ShippingController::class, 'getCountries'])->name('get-countries');
Route::get('get-countries-codes', [ShippingController::class, 'getCountryCodes'])->name('get-countries-codes');
Route::post('get-shipping-cost', [ShippingController::class, 'getShippingCostByCountryName'])->name('get-shipping-cost-by-country-name');
Route::get('success-transaction', [OrderController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction/{order_id}', [OrderController::class, 'cancelTransaction'])->name('cancelTransaction');
