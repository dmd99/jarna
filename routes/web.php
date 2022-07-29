<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Shop\ShopController;
use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BaseController::class, 'index']);

//Authentication
Auth::routes();
Route::get('/auth/{provider}', [OauthController::class, 'redirect'])->name('Socialite_redirect');
Route::get('/auth/{provider}/callback', [OauthController::class, 'callback'])->name('Socialite_callback');

# Voyager
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

#Profile
Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    Route::get('/profile/wishlist', [ProfileController::class, 'index'])
        ->name('profile.wishlist');

    Route::get('/edit_profile/{id}', [ProfileController::class, 'update'])
        ->name('profile.edit');

    Route::get('/edit_address/{id}', [ProfileController::class, 'updateAddress'])
        ->name('profile.edit.address');
});

# Admin Shop Owner
Route::group(['prefix' => 's/{slug}', 'name'=>'seller', 'middleware' => ['auth', 'seller']], function () {
    Route::resource('shops', SellerController::class)->names('seller.product');
});

# Admin Shop
Route::group(['prefix' => 'a', 'middleware' => ['adm', 'auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    #Shop  routes for admin;
    route::resources(['shops' => ShopController::class]);
});
# 
Route::group([], function () {
    Route::get('/shops',[ShopController::class, 'shop']);
    Route::get('/shops/{shop}',[ShopController::class, 'showShop']);
});
