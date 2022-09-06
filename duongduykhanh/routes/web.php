<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Frontend\CustomerLoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ShopcartController;
use App\Http\Controllers\Frontend\InformationPageController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\OrderController;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/category/{slug}',[HomeController::class,'allProductByCat']);
Route::get('/brand/{slug}',[HomeController::class,'allProductByBrand']);
Route::get('/detail/{slug}',[HomeController::class,'productDetail']);
Route::get('/search',[HomeController::class,'search']);

Route::get('/admin/login',[LoginController::class,'login'])->name('login');
Route::post('/admin/dologin',[LoginController::class,'doLogin']);

Route::post('/register', [CustomerLoginController::class,'register'])->name('user.register');

Route::get('/login',[CustomerLoginController::class,'login'])->name('logincustomer');
Route::post('/dologin',[CustomerLoginController::class,'doLogin']);
Route::get('/logout',[CustomerLoginController::class,'logout']);
Route::get('/checkout',[ShopcartController::class,'checkout']);
Route::post('/doCheckout',[ShopcartController::class,'doCheckout']);


Route::get('/pages/{id}', [InformationPageController::class,'show']);

Route::middleware(['auth:user'])->group(function()
{
    Route::prefix('/admin')->group(function(){
    Route::get('/logout',[LoginController::class,'logout']);
    Route::get('/', [MainController::class, 'index'])->name('admin');

    Route::resource('/category', CategoryController::class);
    Route::get('/category/{id}/trash', [CategoryController::class, 'trash']);
    Route::get('/category-intrash', [CategoryController::class, 'intrash']);
    Route::get('/category/{id}/restore', [CategoryController::class, 'restore']);
    Route::get('/category/{id}/toggleStatus', [CategoryController::class, 'toggleStatus']);

    Route::resource('/page', PageController::class);
    Route::get('/page/{id}/trash', [PageController::class, 'trash']);
    Route::get('/page-intrash', [PageController::class, 'intrash']);
    Route::get('/page/{id}/restore', [PageController::class, 'restore']);
    Route::get('/page/{id}/toggleStatus', [PageController::class, 'toggleStatus']);

    Route::resource('/link', LinkController::class);
    Route::get('/link/{id}/trash', [LinkController::class, 'trash']);
    Route::get('/link-intrash', [LinkController::class, 'intrash']);
    Route::get('/link/{id}/restore', [LinkController::class, 'restore']);
    Route::get('/link/{id}/toggleStatus', [LinkController::class, 'toggleStatus']);

    Route::resource('/brand', BrandController::class);
    Route::get('/brand/{id}/trash', [BrandController::class, 'trash']);
    Route::get('/brand-intrash', [BrandController::class, 'intrash']);
    Route::get('/brand/{id}/restore', [BrandController::class, 'restore']);


    Route::resource('/product', ProductController::class);
    Route::get('/product/{id}/trash', [ProductController::class, 'trash']);
    Route::get('/product-intrash', [ProductController::class, 'intrash']);
    Route::get('/product/{id}/restore', [ProductController::class, 'restore']);
    Route::get('/product/{id}/toggleStatus', [ProductController::class, 'toggleStatus']);

    Route::get('informations', [InformationController::class, 'index']);
    Route::get('information/create', [InformationController::class, 'create']);
    Route::post('information/store', [InformationController::class, 'store'])->name('store.information');
    Route::get('information/{id}/edit', [InformationController::class, 'show']);
    Route::get('/information/{id}', [InformationController::class, 'edit']);
    Route::post('/information/{id}', [InformationController::class, 'update'])->name('update.information');
    Route::get('information/{id}/trash', [InformationController::class, 'destroy']);
    Route::get('informations/trash', [InformationController::class, 'trash']);
    Route::get('information/revert/{id}', [InformationController::class, 'revert']);
    Route::get('orders', [OrderController::class, 'index']);

    Route::get('order/{id}', [OrderController::class, 'show']);
    Route::get('order/{id}/edit', [OrderController::class, 'edit']);
    Route::get('order/{id}', [OrderController::class, 'trash']);
    });
});
Route::get('/cart',[ShopcartController::class,'cart']);
Route::get('/cart_Add/{slug}',[ShopcartController::class,'cart_Add']);
Route::get('/cart_Delete/{row_id}',[ShopcartController::class,'cart_Delete']);
Route::get('/cart_dec/{row_id}',[ShopcartController::class,'cart_dec']);
Route::get('/cart_inc/{row_id}',[ShopcartController::class,'cart_inc']);