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
    return view('welcome');
})->name('welcome');

Route::get('/privacy', function () {
    return view('privacy-policy');
});
Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/homepage', function () {
    return view('homepage');
});
Route::get('/setting', function () {
    return view('setting');
});
Route::get('/refer', function () {
    return view('referafriend');
});
Route::get('/ads', function () {
    return view('advert');
});
Route::get('/ads2', function () {
    return view('advert2');
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
