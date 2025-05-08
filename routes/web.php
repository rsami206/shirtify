<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
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


// nav link setup
Route::get('/contect',[ShopController::class,'contect'])->name('contect');




// Admin Dashboard Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {

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



    // category crud routs

    
   Route::get('/cats/create', [CategoryController::class,'create'])->name('cats.create');
   Route::post('/cats/store', [CategoryController::class,'store'])->name('cats.store');
   Route::DELETE('/cats/delete/{id}',[CategoryController::class,'destroy'])->name('cat.delete');
   Route::get("/cats/edit/{id}", [CategoryController::class, 'edit'])->name('cat.edit');
   Route::post("/cats/update/{id}", [CategoryController::class, 'update'])->name('cats.update');

});
