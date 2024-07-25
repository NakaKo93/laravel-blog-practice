<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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
    [BlogController::class, 'FindAllBlog']
)->name('blogs');

Route::post('/blogs',
    [BlogController::class, 'CreateBlogProcess']
)->name('blogs');

Route::post('/blogs/search',
    [BlogController::class, 'SearchBlogProcess']
)->name('blogsSearch');