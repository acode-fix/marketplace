<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditlogController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\LearnController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BadgeController;
use App\Models\User;
use App\Notifications\ReviewPushNotification;






// web.php
Route::get('/sellers-shop', [ProductController::class, 'showSellerShop']);
Route::get('/product_des/{id}', [ProductController::class, 'showProduct']);
// Route::get('/sellers-shop/{productId}', [ProductController::class, 'showSellerShop'])->name('sellers-shop');
// Route::get('/product_des', [ProductController::class, 'showProductDes']);
Route::get('/sellers-shop/{userId}', [ShopController::class, 'showUserShop'])->name('sellers.shop');

// Route::get('/category_search/{id}', [CategoriesController::class, 'show']);

// web.php
// Route::get('/api/product/{id}', [ProductController::class, 'getProductData']);
Route::get('/ggg', [ProductController::class, 'index']);


Route::get('/api/learn', [LearnController::class, 'getLearnData']);
Route::get('/form', function () {
    return view('frontend.productform');
});
Route::get('/learn3', function () {
    return view('frontend.learn3');
});

Route::get('/learn4', function () {
    return view('frontend.learn4');
});
Route::get('/learn5', function () {
    return view('frontend.learn5');
});

Route::get('/audit-logs', [AuditlogController::class, 'index']);

Route::get('/public', function () {
    return view('index_public');
});

Route::get('/', function () {
    return view('index');
});
// Route::get('/dashboard', function () {
//     return view('admin.index');
// });

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
Route::get('/category_search/{id}', function () {
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

Route::get('/review/{id}', function () {
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

//Paystack Web Route;

Route::get('/payment/callback', [PaymentController::class, 'checkTransactionRef']);

Route::get('/payment-success', [PaymentController::class, 'successPage'])->name('success.page');

//Admin Authentication Route;

Route::get('/admin/login', function() {
    return view('admin.login');

});
Route::get('/admin/reset-password', function() {
    return view('admin.reset_password');

})->name('reset');

//Admin Dashboard Page Route;

Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');

})->name('admin.dashboard');

Route::get('/admin/verification/view', function() {

    return view('admin.verify.view');
});
Route::get('/admin/view/user', function() {

    return view('admin.verify.user_details');
});

Route::get('/admin/dashboard/alluser', function() {

    return view('admin.user.alluser');
});

Route::get('/admin/products/view', function() {

    return view('admin.products.view');

})->name('products.view');

Route::get('admin/view/product-details', function() {
    
    return view('admin.products.fulldetails');

});

Route::get('admin/products/view/product-performance', function() {
    return view(('admin.products.sales'));
})->name('products.sales');


Route::get('admin/products/view/search', function() {
    return view(('admin.products.search'));
})->name('products.search');

Route::get('admin/badge/view', function() {

    return view('admin.user.badge');

})->name('badge.view');


Route::get('/product/shared/{link}', [ProductController::class, 'loadSharedProduct' ]);

Route::get('/check-badge', [BadgeController::class, 'verifyBadge']);

Route::get('/notification', [UsersController::class, 'sendNotification']);

Route::get('/rating/{id}', function () {
    return view('other_frontend.rating');
});


Route::get('/about', function() {
    return view('other_frontend.about');

});



