<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\InstagramPostController as AdminInstagramPostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/shop', [ProductController::class, 'shop'])->name('shop');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.detail');

// New routes for static pages
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [App\Http\Controllers\ContactController::class, 'showContactForm'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'sendEmail'])->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminProductController::class, 'index'])->name('admin.index');
    Route::resource('/admin/products', AdminProductController::class)->names('admin.products');
    Route::resource('/admin/posts', AdminPostController::class)->names('admin.posts');
    Route::resource('/admin/categories', AdminCategoryController::class)->names('admin.categories');
    Route::resource('/admin/instagram-posts', AdminInstagramPostController::class)->names('admin.instagram-posts');

    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
});

require __DIR__.'/auth.php';