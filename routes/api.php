<?php

use App\Http\Controllers\AuditlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewersController;
use App\Models\Reviewers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//, 'permission:admin,market_user'

Route::post('/auth/register', [UsersController::class, 'store']);
Route::post('/auth/login', [UsersController::class, 'loginUser']);
Route::post('/auth/update/{id}',[UsersController::class, 'update']);
//Route::post('/auth/edit/{id}',[UsersController::class, 'edit']);



Route::prefix('v1')->middleware('auth:sanctum')->group(function () {

Route::get('/users', [UsersController::class, 'view']);
//Route::get('/product/{id}', [AuditlogController::class, 'create']);

// //product
// Route::post('/product', [ProductController::class, 'store'])->middleware('can:store_product');
// Route::get('/product/user/{id}', [ProductController::class, 'showUser']);
// Route::get('/product/{id}', [ProductController::class, 'view'])->middleware('can:view_product');
// Route::get('/product/{id}/edit',[ProductController::class, 'edit'])->middleware('can:edit_product');
// Route::post('/product/{id}',[ProductController::class, 'update'])->middleware('can:update_product');
// Route::delete('/product/{id}',[ProductController::class, 'delete'])->middleware('can:delete_product');

//product
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/user/{id}', [ProductController::class, 'showUser']);
Route::get('/product/{id}', [ProductController::class, 'view']);
Route::get('/product/{id}/edit',[ProductController::class, 'edit']);
Route::post('/product/{id}',[ProductController::class, 'update']);
Route::delete('/product/{id}',[ProductController::class, 'delete']);
//reviews
Route::post('/reviewers', [ReviewersController::class, 'store']);
Route::get('/reviewers/{id}', [ReviewersController::class, 'view']);
Route::post('/reviewers/{id}',[ReviewersController::class, 'update']);
Route::get('/review/{id}', [ReviewersController::class, 'viewUserMetric']);
Route::get('/reviewall', [ReviewersController::class, 'allUserMetric']);
Route::get('/reviewcomment', [ReviewersController::class, 'allUserComment']);
//Route::get('/reviewers', [ReviewersController::class, 'show']);
//categories
Route::get('/category/{id}', [CategoriesController::class, 'view']);
Route::get('/categories/{id}', [CategoriesController::class, 'list']);
Route::get('/search/{search}', [CategoriesController::class, 'search']);



});




