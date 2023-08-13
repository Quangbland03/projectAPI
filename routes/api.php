<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('list', [ProductController::class, 'indexHome']);

Route::get('listSmart', [ProductController::class, 'indexSmart']);
Route::get('listCamera', [ProductController::class, 'indexCamera']);
Route::get('listAccessories', [ProductController::class, 'indexAccessories']);
Route::get('list', [ProductController::class, 'index']);

Route::get('listok/{id}', [ProductController::class, 'show']);
Route::get('listSmart', [ProductController::class, 'indexSmart']);
Route::get('listCamera', [ProductController::class, 'indexCamera']);
Route::get('listAccessories', [ProductController::class, 'indexAccessories']);
Route::post('storeProduct', [ProductController::class, 'store']);
Route::get('listCategory', [CategoryController::class, 'index']);
Route::delete('deleteProduct/{id}', [ProductController::class, 'destroy']);

