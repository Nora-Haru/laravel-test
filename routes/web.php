<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;


        Route::get('/', function () {
            return view('homepage', [
                "title" => "home"
            ]);
        });

        Route::get('/about', function () {
            return view('aboutme', [
                "title" => "About ",
                "name" => "Nur Falah Ramadan",
                "school" => "SMK Negeri 1 Pacitan",
                "email" => "nurfalahramadan45@gmail.com",
                "phoneNumber" => "083845325296"
            ]);
        });

        Route::get('/posts',[PostController::class, 'index']);
        Route::get('/posts/{post:slug}',[PostController::class, 'show']);

        Route::get('/categories', function() {
            return view('categories', [
                'title' => 'Post Categories',
                'categories' => Category::all()
            ]);
        });

        Route::get('/categories/{category:slug}', function(Category $category) {
            return view('posts', [
                'title' => "Post by Category: $category->name",
                'posts' => $category->posts->load('category', 'author')
            ]);
        });

        Route::get('/authors/{author:username}', function(User $author) {
            return view('posts', [
                'title' => "Post by Author: $author->name",
                'posts' => $author->posts->load('category', 'author')
            ]);
        });

        Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
        Route::post('/login', [LoginController::class, 'authenticate']);
        Route::post('/logout', [LoginController::class, 'logout']);

        Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
        Route::post('/register', [RegisterController::class, 'store']);

        Route::get('/dashboard', function() {
            return view('dashboard.index');
        })->middleware('auth');

        Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])
        ->middleware('auth');
        
        Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])
        ->middleware('auth');
    
        Route::resource('/dashboard/posts', DashboardPostController::class)
        ->middleware('auth');

        Route::resource('/dashboard/categories', AdminCategoryController::class)
        ->middleware('auth')
        ->except('show');

        Route::get('/', [HomeController::class, 'index']);
        Route::get('/dashboard', [DashboardController::class, 'index']);

        Route::get('/dashboard/categories/create', [AdminCategoryController::class, 'create']);
        Route::post('/dashboard/categories', [AdminCategoryController::class, 'store']);    
        Route::get('/dashboard/categories/{category:slug}/edit', [AdminCategoryController::class, 'edit']);
        Route::put('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'update']);
        Route::delete('/dashboard/categories/{category:slug}', [AdminCategoryController::class, 'destroy']);

        Route::get('/dashboard/authors', [AuthorController::class, 'index'])->middleware('auth')->name('authors.index');