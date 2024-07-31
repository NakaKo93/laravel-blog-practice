<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ApodController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/blogs',
    [BlogController::class, 'FindAllPublishedBlog']
)->name('blogs');

Route::post('/blogs',
    [BlogController::class, 'CreateBlogProcess']
)->name('blogs');

Route::get('/all-blogs',
    [BlogController::class, 'FindAllBlog']
)->name('allBlogs');

Route::post('/blogs/search',
    [BlogController::class, 'SearchBlogProcess']
)->name('blogsSearch');

Route::post('/apod',
    [ApodController::class, 'ApodProcess']
)->name('apod');