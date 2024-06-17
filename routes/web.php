<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditlogController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\HomeController;



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


Route::get('/api/learn', [LearnController::class, 'getLearnData']);
Route::get('/learn3', function () {
    return view('frontend.learn3');
});

Route::get('/audit-logs', [AuditlogController::class, 'index']);

Route::get('/public', function () {
    return view('index_public');
});

Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return view('admin.index');
});

Route::get('/shop', function () {
    return view('frontend.shop');
});
Route::get('/learn', function () {
    return view('frontend.learn');
});
Route::get('/ads', function () {
    return view('frontend.ads');
});
Route::get('/settings', function () {
    return view('frontend.settings');
});
Route::get('/wallet', function () {
    return view('frontend.wallet');
});
Route::get('/privacy', function () {
    return view('frontend.privacy');
});
Route::get('/delete', function () {
    return view('frontend.delete');
});
Route::get('/refer', function () {
    return view('frontend.refer');
});

// other frontend
Route::get('/ads_placement', function () {
    return view('other_frontend.ads_placement');
});
Route::get('/ads2', function () {
    return view('other_frontend.ads2');
});
Route::get('/badge', function () {
    return view('other_frontend.badge');
});
Route::get('/become', function () {
    return view('other_frontend.become');
});
Route::get('/bio', function () {
    return view('other_frontend.bio');
});
Route::get('/category_search', function () {
    return view('other_frontend.category_search');
});
Route::get('/create_ads', function () {
    return view('other_frontend.create_ads');
});
Route::get('/id', function () {
    return view('other_frontend.id');
});
Route::get('/nin', function () {
    return view('other_frontend.nin');
});
Route::get('/no-list', function () {
    return view('other_frontend.no-list');
});
Route::get('/no-result', function () {
    return view('other_frontend.no-result');
});
Route::get('/notification_mobile', function () {
    return view('other_frontend.notification_mobile');
});
Route::get('/product_des', function () {
    return view('other_frontend.product_des');
});
Route::get('/rating', function () {
    return view('other_frontend.rating');
});
Route::get('/review', function () {
    return view('other_frontend.review');
});
Route::get('/search', function () {
    return view('other_frontend.search');
});
Route::get('/selfie', function () {
    return view('other_frontend.selfie');
});
Route::get('/sellers-shop', function () {
    return view('other_frontend.sellers-shop');
});
Route::get('/start_selling', function () {
    return view('other_frontend.start_selling');
});
Route::get('/success', function () {
    return view('other_frontend.success');
});



//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
