<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartFinalController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/login', [AdminLoginController::class, 'index']);
Route::post('admin/login', [AdminLoginController::class, 'loginPost']);
Route::get('admin/logout', [AdminLoginController::class, 'logout']);
Route::get('admin/register', [AdminRegisterController::class, 'create']);
Route::post('admin/register', [AdminRegisterController::class, 'store']);





// // Route::get('/admin/order', function () {
// //     return view('admin.order');
// // });
// // Route::get('admin/account', function () {
// //     return view('admin.account');
// // });
Route::get('admin/account', function () {
    return view('admin.account');
});

// Route::get('admin/order', function () {
//     return view('admin.order');
// });



route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('product', function () {
        return view('admin.product');
    });
    Route::get('account', function () {
        return view('admin.account');
    });
    Route::get('order', function () {
        return view('admin.order');
    });
});




Route::get('listop1', [CartFinalController::class, 'store']);
// user
Route::get('cart', function () {
    return view('users.cart');
})->middleware('auth');
Route::get('checkout', function () {
    return view('users.checkout');
});
Route::get('createProduct', function () {
    return view('admin.createProduct');
});
Route::get('laptop', function () {
    return view('users.laptop');
});
Route::get('updateProduct/{id}', function () {
    return view('admin.updateProduct');
});
Route::get('editAccount/{id}', function () {
    return view('admin.editAccount');
});
Route::get('productDetail/{id}', function () {
    return view('users.productDetail');
});
Route::get('/', function () {
    return view('users.home');
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
Route::get('listokt', [ProductController::class, 'show']);
require __DIR__ . '/auth.php';
