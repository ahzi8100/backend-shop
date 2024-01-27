<?php

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

Route::get('/', function () {
    return view('auth.login');
});

// route for admin

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        //route dashboard
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');

        //route category
        Route::resource('/category', \App\Http\Controllers\Admin\CategoryController::class, ['as' => 'admin']);

        //route product
        Route::resource('/product', \App\Http\Controllers\Admin\ProductController::class, ['as' => 'admin']);
    });
});
