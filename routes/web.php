<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContectController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// shop routes
Route::get("/", [BlogController::class, 'index'])->name('shop.index');
Route::get('/shirt/{slug}', [BlogController::class, 'detail'])->name('shop.detail');


Route::get("/login", [AuthController::class, 'loginForm'])->name("loginForm");
Route::post("/login", [AuthController::class, 'login'])->name("login");
Route::post("/logout", [AuthController::class, 'logout'])->name('logout');
Route::get("/signup", [AuthController::class, 'signupForm'])->name("signupForm");
Route::post("/register", [AuthController::class, 'register'])->name("register");


//  nav link hendle contects, about
Route::get('/about', [ShopController::class, 'about'])->name('about.show');
Route::get('/services', [ShopController::class, 'services'])->name('services.show');
Route::get('/testimonial', [ShopController::class, 'testimonial'])->name('testimonial.show');

Route::get('/contact', [ContectController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContectController::class, 'submit'])->name('contact.submit');



// Admin Dashboard Routes
Route::middleware(['auth','is_admin'])->prefix('admin')->group(function () {

    Route::get("/main", [AdminController::class, 'index'])->name('admin.main');
    Route::get("/products", [AdminController::class, 'products'])->name('admin.products');
    Route::get("/category", [AdminController::class, 'category'])->name('admin.category');
    Route::get("/orders", [AdminController::class, 'orders'])->name('admin.orders');

    // product crud routes

    Route::get("/product/create", [ProductController::class, 'create'])->name('admin.products.create');
    Route::post("/product/store", [ProductController::class, 'store'])->name('admin.products.store');
    Route::get("/product/edit/{id}", [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::DELETE("/product/destroy/{id}", [ProductController::class, 'delete'])->name('admin.products.destroy');
    Route::post("/product/update/{id}", [ProductController::class, 'update'])->name('admin.product.update');





    // jaskhasdkj
    Route::get('/category/{id}', [ProductController::class, 'categoryProducts'])->name('category.products');




    // category crud routs

    
   Route::get('/cats/create', [CategoryController::class,'create'])->name('cats.create');
   Route::post('/cats/store', [CategoryController::class,'store'])->name('cats.store');
   Route::DELETE('/cats/delete/{id}',[CategoryController::class,'destroy'])->name('cat.delete');
   Route::get("/cats/edit/{id}", [CategoryController::class, 'edit'])->name('cat.edit');
   Route::post("/cats/update/{id}", [CategoryController::class, 'update'])->name('cats.update');

});


// cart setup
// Route::middleware(['auth'])->group(function () {

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

// });

// orders route

Route::get('/place-order', [OrderController::class, 'placeOrder'])->name('orderplace')->middleware('auth');
Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show')->middleware('auth');

