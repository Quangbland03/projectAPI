<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartAgainController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartFinalController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//User
Route::get('getid', [CartFinalController::class, 'getid']);
Route::post('listop1', [CartFinalController::class, 'store']);
Route::get('listop', [CartFinalController::class, 'index']);
Route::get('list', [ProductController::class, 'indexHome']);
Route::get('listSmart', [ProductController::class, 'indexSmart']);
Route::get('listCamera', [ProductController::class, 'indexCamera']);
Route::get('listAccessories', [ProductController::class, 'indexAccessories']);
Route::get('listok/{id}', [ProductController::class, 'show']);
Route::get('listSmart', [ProductController::class, 'indexSmart']);
Route::get('listCamera', [ProductController::class, 'indexCamera']);
Route::get('listAccessories', [ProductController::class, 'indexAccessories']);
Route::get('listLaptop', [ProductController::class, 'indexLaptop']);
Route::get('testy', [CartAgainController::class, 'index']);
Route::get('getUser', [UserController::class, 'index']);
Route::get('getUserFind/{id}', [UserController::class, 'show']);
Route::delete('deleteAccount/{id}', [UserController::class, 'destroy']);
Route::get('gett', [CartAgainController::class, 'index']);
Route::get('listcart', [CartFinalController::class, 'index']);
// Route::post('storeCart', [CartAgainController::class, 'store']);
Route::get('saveOrder', [CheckoutController::class, 'index']);
Route::delete('deleteCart/{id}', [CartFinalController::class, 'destroy']);
Route::post('saveCheckout', [OrderController::class, 'store']);
Route::post('saveCustomer', [CustomerController::class, 'store']);
// Route::delete('deleteCart/{id}', [CartController::class, 'destroy']);
Route::post('search', [ProductController::class, 'search']);


//admin
Route::post('storeProduct', [ProductController::class, 'store']);
Route::get('listCategory', [CategoryController::class, 'index']);
Route::get('listProduct/{id}', [ProductController::class, 'show1']);
Route::delete('deleteProduct/{id}', [ProductController::class, 'destroy']);
Route::put('updateProduct/{id}', [ProductController::class, 'update']);
Route::put('updateAccount/{id}', [UserController::class, 'update']);

