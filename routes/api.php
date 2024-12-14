<?php

use App\Http\Controllers\AdminController;
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
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdvertController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BadgeController;
use App\Models\Verification;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//, 'permission:admin,market_user'

Route::get('/userStatus', [UsersController::class, 'status']);

Route::get('/allproduct', [ProductController::class, 'index']);

Route::post('/auth/register', [UsersController::class, 'register']);
Route::post('/auth/login', [UsersController::class, 'loginUser']);
Route::post('/admin/login', [UsersController::class, 'adminLogin']);

//PRODUCT SHARED LINK;
Route::post('/product/shared', [ProductController::class, 'getSharedProductDetails']);
Route::get('/product-details/{id}', [ProductController::class, 'getProductDetails']);



// reset Password
Route::post('forgot-password', [PasswordResetController::class, 'sendResetOtp']);
Route::post('verify-otp', [PasswordResetController::class, 'verifyOtp']);
Route::post('reset-password', [PasswordResetController::class, 'resetPassword']);



Route::get('/prod', [ProductController::class, 'index']);
Route::get('/prod/{id}', [ProductController::class, 'view']);
//Route::get('/product-details/{id}', [ProductController::class, 'getProductDetails']);

Route::post('/product', [ProductController::class, 'store']);
Route::get('/user/products', [ProductController::class, 'userProducts']);


//
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('notifications', [NotificationController::class, 'index']);
//     Route::get('notifications/{id}', [NotificationController::class, 'show']);
//     Route::put('notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead']);
//     Route::delete('notifications/{id}', [NotificationController::class, 'destroy']);
// });


Route::prefix('v1')->middleware('auth:sanctum')->group(function () {

Route::get('/users', [UsersController::class, 'view']);
Route::post('/auth/update',[UsersController::class, 'accountSettings']);
Route::post('/auth/logout',[UsersController::class, 'logoutUser']);
Route::get('/getuser', [UsersController::class, 'getUserData']);
Route::get('/referral-link', [UsersController::class, 'getReferralLink']);
Route::delete('/user', [UsersController::class, 'deleteAccount']);
Route::get('/userDetails', [UsersController::class, 'getUserPayment']);
Route::post('/shop/update',[UsersController::class, 'uploadBanner']);

// Get userId;

Route::get('/userId',[UsersController::class, 'getUserId']);

//BECOME A VERIFIED SELLER Form Submission Route;

Route::post('/verify/bio', [VerificationController::class, 'bioForm']);
Route::post('/verify/nin', [VerificationController::class, 'ninUpload']);
Route::post('/verify/nin-cam', [VerificationController::class, 'ninCamUpload']);
Route::post('/verify/image', [VerificationController::class, 'imageUpload']);
Route::post('/verify/badge', [VerificationController::class, 'badgeType']);

//Payment Route;

Route::get('/payment/init', [PaymentController::class, 'badgeFeePaystackInit']);

//Admin Verification Route;

Route::get('/verify/user', [VerificationController::class, 'index']);
Route::get('/view/approved/user', [VerificationController::class, 'showApproved']);
Route::get('/view/rejected/user', [VerificationController::class, 'showRejectedUser']);
Route::post('/approve/user', [VerificationController::class, 'approveUserVerification']);
Route::post('/reject/user', [VerificationController::class, 'rejectUserVerification']);


//ADMIN USER MENU ROUTES;

Route::get('admin/registered-user',[AdminController::class, 'index']);
Route::get('admin/edit/{id}', [AdminController::class, 'edit']);
Route::post('admin/store/{id}', [AdminController::class, 'store']);
Route::post('admin/suspend-user', [AdminController::class, 'suspend']);
Route::post('admin/delete/{id}', [AdminController::class, 'destroy']); 
Route::get('admin/suspended-users', [AdminController::class, 'getSuspendedUsers']);
Route::post('admin/unsuspend/{id}', [AdminController::class, 'unsuspendUsers']);
Route::get('admin/deleted-account', [AdminController::class, 'getDeletedAccounts']);


//ADMIN PRODUCTS MENU ROUTES; 
Route::get('admin/product-details/{id}', [ProductController::class, 'getAdminProductDetails']);
Route::get('admin/listed-products', [AdminController::class, 'getUserProducts']);
Route::get('admin/delisted-products', [AdminController::class, 'getDelistedProducts']);
Route::get('admin/unlisted-products', [AdminController::class, 'getUnlistedProducts']);
Route::get('admin/products-performance', [AdminController::class, 'getProductsByPerformance']);
Route::get('admin/products-category', [AdminController::class, 'getProductCategory']);
Route::get('admin/filter', [AdminController::class, 'getFilteredProducts']);


//ROUTE ADMIN BADGES MENU;
Route::get('admin/badge',[AdminController::class, 'getAllBadges']);


//Route Admin Payments Menu;

Route::get('admin/payments/view', [AdminController::class, 'getAllUserPayments']);
Route::get('admin/payments/filter', [AdminController::class, 'filterUserPayments']);


//ROUTE FOR ADMIN LEARN MENU;

Route::get('/admin/learn', [AdminController::class, 'getLearnData']);
Route::post('admin/update-learn', [AdminController::class, 'storeLearnData']);
Route::get('admin-learn/details', [AdminController::class, 'getLearnDetails']);
Route::post('admin/learn-update', [AdminController::class, 'updateLearnData']);
Route::delete('admin-learn/delete/{id}', [AdminController::class, 'deleteLearnData']);


//ROUTE FOR ADMIN PROFILE DETAILS

Route::get('admin/details',[AdminController::class, 'getProfile']);
Route::post('admin/profile/update',[AdminController::class,'updateProfile']);



//Verified Seller Shop Route;

Route::get('/verified-seller/details', [UsersController::class, 'getDetails']);
Route::get('/verified-seller/id', [UsersController::class, 'getUserId']);


//SEARCH PAGE ROUTE

Route::get('/search/products', [ProductController::class, 'searchProducts']);
Route::get('/product/search/filter', [ProductController::class, 'searchPageFilter']);
Route::get('/search/shop/products', [ProductController::class, 'searchShopProducts']);
Route::get('/recent/search', [ProductController::class, 'getRecentSearch']);






//Route product link 

Route::get('/product/link', [ProductController::class, 'getProductLink']);


//ROUTE PRODUCT ENGAGEMENT

Route::post('/product/engagement', [ProductController::class, 'storeProductEngagement']);


//Route badge status check;

Route::get('/user/badge', [BadgeController::class, 'checkBadgeStatus']);


//ROUTE referral link
Route::get('user/refer-link', [UsersController::class, 'getLink']);


//Route UserNotification
Route::get('/user/notification', [NotificationController::class, 'getNotifications']);
Route::post('/user/update/notification', [NotificationController::class, 'updateReadNotification']);

//ROUTE USER PRODUCT RATING;

Route::get('/user/rating-page',[ReviewersController::class, 'loadRatingContent']);
Route::post('/user/rating-details', [ReviewersController::class, 'Store']);


//ROUTE REVIEW PAGE;

Route::get('/user/review',[ReviewersController::class, 'loadReviewPage']);
Route::get('/user/avg-rating', [ReviewersController::class, 'avgReview']);

//ROUTE PRODUCT REQUEST;
Route::post('/user/product-request', [UsersController::class, 'storeProductRequest']);






//Route::get('/product/{id}', [AuditlogController::class, 'create']);

// //product
// Route::post('/product', [ProductController::class, 'store'])->middleware('can:store_product');
// Route::get('/product/user/{id}', [ProductController::class, 'showUser']);
// Route::get('/product/{id}', [ProductController::class, 'view'])->middleware('can:view_product');
// Route::get('/product/{id}/edit',[ProductController::class, 'edit'])->middleware('can:edit_product');
// Route::post('/product/{id}',[ProductController::class, 'update'])->middleware('can:update_product');
// Route::delete('/product/{id}',[ProductController::class, 'delete'])->middleware('can:delete_product');

//product
//Route::get('/allproduct', [ProductController::class, 'index']);
Route::get('/product/filter', [ProductController::class, 'filterProducts']);
Route::get('/product/category-filter', [ProductController::class, 'filterProductByCategory']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/user/{id}', [ProductController::class, 'showUser']);

Route::get('/product/{id}', [ProductController::class, 'getProduct']);
//Route::get('/product/{id}/edit',[ProductController::class, 'edit']);  

//Route::post('/product/{id}',[ProductController::class, 'update']);
Route::post('/product/edit/{id}', [ProductController::class, 'update']);

//Route::get('/product/search', [ProductController::class, 'search']);
Route::delete('/product/delete/{id}',[ProductController::class, 'delete']);
Route::get('/user/products', [ProductController::class, 'userProducts']);
// Route::get('/sellers-shop/{productId}', [ProductController::class, 'showSellerShop']);
Route::get('/seller-details/{productId}', [ProductController::class, 'getSellerDetails']);
Route::get('/sellers/{sellerId}/products', [ProductController::class, 'getProductsBySeller']);

Route::get('/seller-shop/{userId}', [UsersController::class, 'showSellerShop']);




//reviews
// Route::post('/reviewers', [ReviewersController::class, 'store']);
// Route::get('/reviewers/{id}', [ReviewersController::class, 'view']);
// Route::post('/reviewers/{id}',[ReviewersController::class, 'update']);
// Route::get('/review/{id}', [ReviewersController::class, 'viewUserMetric']);
// Route::get('/reviewall', [ReviewersController::class, 'allUserMetric']);
// Route::get('/reviewcomment', [ReviewersController::class, 'allUserComment']);
//Route::get('/reviewers', [ReviewersController::class, 'show']);

//categories
Route::get('/category/{id}', [CategoriesController::class, 'view']);
Route::get('/categories/{id}', [CategoriesController::class, 'list']);
Route::get('/category_search/{id}', [CategoriesController::class, 'show']);
// Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::get('/search/{search}', [CategoriesController::class, 'search']);

// Learn Page
Route::get('/videos', [LearnController::class, 'index']);
Route::get('videos/{id}', [LearnController::class, 'show']);
Route::post('videos', [LearnController::class, 'store']);
Route::put('videos/{id}', [LearnController::class, 'update']);
Route::delete('videos/{id}', [LearnController::class, 'destroy']);


    
// Verification
//Route::post('/verifications', [VerificationController::class, 'store']);
Route::post('/verifications/{id}/approve', [VerificationController::class, 'approve'])->middleware('admin');
Route::post('/verification/bio', [VerificationController::class, 'storeBio']);
Route::post('/verification/nin', [VerificationController::class, 'uploadNIN']);
Route::post('/verification/selfie', [VerificationController::class, 'uploadSelfie']);
Route::post('/verification/status', [VerificationController::class, 'updateVerificationStatus']);



// Route::post('/adverts', [AdvertController::class, 'store']);
// Route::get('/adverts/create', [AdvertController::class, 'create']);
// Route::post('/adverts/price', [AdvertController::class, 'calculatePrice']);
// Route::post('/adverts/{advert}', [AdvertController::class, 'update']);
// Route::post('/adverts/{advert}', [AdvertController::class, 'destroy']);



});

// Route::get('/adverts', 'AdvertController@index');
// Route::put('/adverts/{advert}', 'AdvertController@update')->middleware('auth');
// Route::delete('/adverts/{advert}', 'AdvertController@destroy')->middleware('auth');

// Route::get('/adverts/create', [AdvertController::class, 'create'])->name('adverts.create');
// Route::post('/adverts', [AdvertController::class, 'store'])->name('adverts.store');
// Route::post('/adverts/price', [AdvertController::class, 'calculatePrice'])->name('adverts.calculatePrice');





