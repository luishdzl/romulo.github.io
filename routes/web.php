<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\CategoryController; // Semicolon added
use App\Models\Post;
use Illuminate\Routing\Route as RoutingRoute; // Semicolon added
use App\Http\Controllers\HomeController;
use App\Models\Category;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HerramientaController;

Route::get('/', function () {
  return view('welcome');
});

Route::middleware([
  'auth:sanctum',
  config('jetstream.auth_session'),
  'verified',
])->group(function () {
  Route::get('/dashboard', function () {
    return view('dashboard');
  })->name('dashboard');
});

// admin routes
Route::get('home', [HomeController::class, 'index'])->name('admin.home');
// admin routes
Route::resource('categories', CategoryController::class)->names('admin.categories');
// admin routes
Route::resource('tags', TagController::class)->names('admin.tags');
// admin routes
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
  Route::resource('herramientas', HerramientaController::class)->names('admin.herramientas');
});
// ruta de los modelos para usuario

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts', [PostController::class, 'post'])->name('posts');