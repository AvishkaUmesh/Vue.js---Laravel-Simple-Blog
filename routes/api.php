<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('posts', PostsController::class);
Route::apiResource('category', CategoryController::class);
Route::get('pages/', [PostsController::class, 'pagination']);
Route::get('recent/', [PostsController::class, 'recentPosts']);
Route::get('trending/', [PostsController::class, 'trendingPosts']);
Route::get('category/{id}/posts', [PostsController::class, 'getPostByCategory']);
Route::get('search/{search}', [PostsController::class, 'getPostBySearch']);


Route::group(['middleware' => ['auth:sanctum']], function () {
});
