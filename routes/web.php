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
    return view('users.home');
})->name('home');

Route::get('/a', function () {
    return view('users.layoutUser');
});

route::prefix('admin')->name('admin.')->group(function()
    {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('product', function () {
        return view('admin.product');
    })->name('product');
    Route::get('/admin/order', function () {
        return view('admin.order');
    })->name('order');
    Route::get('/admin/user', function () {
        return view('admin.user');
    })->name('user');
});


Route::get('productDetail/{id}', function () {
    return view('users.productDetail');
});

Route::get('productDetail/{id}', function () {
    return view('users.productDetail');
});

Route::get('/', function () {
    return view('admin.product');
});
Route::get('/a', function () {
    return view('users.layoutUser');

});
Route::get('/smartphone', function () {
    return view('users.smartPhone');
})->name('smartphone');
Route::get('/camera', function () {
    return view('users.camera');
})->name('camera');
Route::get('/accessories', function () {
    return view('users.accessories');
})->name('accessories');



