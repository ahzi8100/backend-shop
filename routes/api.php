<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// route api auth customer
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('api.customer.login');
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register'])->name('api.customer.register');
Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'getUser'])->name('api.customer.user');

//route api order
Route::get('/order', [\App\Http\Controllers\Api\OrderController::class, 'index'])->name('api.order.index');
Route::get('/order/{snap_token?}', [\App\Http\Controllers\Api\OrderController::class, 'show'])->name('api.order.show');

//route api category
Route::get('/categories', [\App\Http\Controllers\Api\CategoryController::class, 'index'])->name('api.category.index');
Route::get('/category/{slug?}', [\App\Http\Controllers\Api\CategoryController::class, 'show'])->name('api.category.show');
Route::get('/categoryHeader', [\App\Http\Controllers\Api\CategoryController::class, 'categoryHeader'])->name('api.category.categoryHeader');

//route api product
Route::get('/products', [\App\Http\Controllers\Api\ProductController::class, 'index'])->name('customer.product.index');
Route::get('/product/{slug?}', [\App\Http\Controllers\Api\ProductController::class, 'show'])->name('customer.product.show');

//route api cart
Route::get('/cart', [\App\Http\Controllers\Api\CartController::class, 'index'])->name('customer.cart.index');
Route::post('/cart', [\App\Http\Controllers\Api\CartController::class, 'store'])->name('customer.cart.store');
Route::get('/cart/total', [\App\Http\Controllers\Api\CartController::class, 'getCartTotal'])->name('customer.cart.total');
Route::get('/cart/totalWeight', [\App\Http\Controllers\Api\CartController::class, 'getCartTotalWeight'])->name('customer.cart.getCartTotalWeight');
Route::post('/cart/remove', [\App\Http\Controllers\Api\CartController::class, 'removeCart'])->name('customer.cart.remove');
Route::post('/cart/removeAll', [\App\Http\Controllers\Api\CartController::class, 'removeAllCart'])->name('customer.cart.removeAll');

//route api rajaongkir
Route::get('/rajaongkir/provinces', [\App\Http\Controllers\Api\RajaOngkirController::class, 'getProvince'])->name('customer.rajaongkir.getProvinces');
Route::get('/rajaongkir/cities', [\App\Http\Controllers\Api\RajaOngkirController::class, 'getCities'])->name('customer.rajaongkir.getCities');
Route::post('/rajaongkir/checkOngkir', [\App\Http\Controllers\Api\RajaOngkirController::class, 'checkOngkir'])->name('customer.rajaongkir.checkOngkir');

//route api checkout
Route::post('/checkout', [\App\Http\Controllers\Api\CheckoutController::class, 'store'])->name('checkout.store');
Route::post('/notificationHandler', [\App\Http\Controllers\Api\CheckoutController::class, 'notificationHandler'])->name('notificationHandler');

//route api sliders
Route::get('/sliders', [\App\Http\Controllers\Api\SliderController::class, 'index'])->name('customer.slider.index');
