<?php

use App\Http\Controllers\AuditlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewersController;
use App\Models\Reviewers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\LearnController;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//, 'permission:admin,market_user'

Route::post('/auth/register', [UsersController::class, 'register']);
Route::post('/auth/login', [UsersController::class, 'loginUser']);
Route::post('/auth/update/{id}',[UsersController::class, 'accountSettings']);
//Route::post('/auth/edit/{id}',[UsersController::class, 'edit']);

// reset Password
Route::post('forgot-password', [PasswordResetController::class, 'sendResetOtp']);
Route::post('verify-otp', [PasswordResetController::class, 'verifyOtp']);
Route::post('reset-password', [PasswordResetController::class, 'resetPassword']);

// Learn Page
Route::get('/videos', [LearnController::class, 'index']);
Route::get('videos/{id}', [LearnController::class, 'show']);
Route::post('videos', [LearnController::class, 'store']);
Route::put('videos/{id}', [LearnController::class, 'update']);
Route::delete('videos/{id}', [LearnController::class, 'destroy']);


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
Route::get('/allproduct', [ProductController::class, 'index']);
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


Route::post('/adverts', [AdvertController::class, 'store']);
Route::get('/adverts/create', [AdvertController::class, 'create']);
Route::post('/adverts/price', [AdvertController::class, 'calculatePrice']);
Route::post('/adverts/{advert}', [AdvertController::class, 'update']);
Route::post('/adverts/{advert}', [AdvertController::class, 'destroy']);



});

Route::get('/adverts', 'AdvertController@index');
Route::put('/adverts/{advert}', 'AdvertController@update')->middleware('auth');
Route::delete('/adverts/{advert}', 'AdvertController@destroy')->middleware('auth');

// Route::get('/adverts/create', [AdvertController::class, 'create'])->name('adverts.create');
// Route::post('/adverts', [AdvertController::class, 'store'])->name('adverts.store');
// Route::post('/adverts/price', [AdvertController::class, 'calculatePrice'])->name('adverts.calculatePrice');





