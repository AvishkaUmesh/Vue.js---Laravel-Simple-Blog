<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//admin routes
Route::get('/admin-login', function () {
    return view('adminLogin');
});
Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    //-------------------------category routes-----------------------------------------------
    Route::get('/addCategory', [AdminController::class, 'addCategoryPage'])->name('admin.addCategoryPage');
    Route::post('/store/category', [AdminController::class, 'storeCategory'])->name('store.category');
    Route::get('/allCategories', [AdminController::class, 'allCategories'])->name('admin.allCategories');
    Route::get('/category/delete/{id}', [AdminController::class, 'deleteCategory']);
    Route::get('/category/edit/{id}', [AdminController::class, 'showCategory']);
    Route::post('/category/update/{id}', [AdminController::class, 'updateCategory']);
    //-------------------------end category routes-----------------------------------------------

    //-------------------------post routes-----------------------------------------------
    Route::get('/addPost', [AdminController::class, 'addPostPage'])->name('admin.addPostPage');
    Route::post('/store/post', [AdminController::class, 'storePost'])->name('store.post');
    Route::get('/allPosts', [AdminController::class, 'allPosts'])->name('admin.allPosts');
    Route::get('/post/delete/{id}', [AdminController::class, 'deletePost']);
    Route::get('/post/edit/{id}', [AdminController::class, 'showPost']);
    Route::post('/post/update/{id}', [AdminController::class, 'updatePost']);
    Route::post('post/image-update/{id}', [AdminController::class, 'updatePostImage']);

    //-------------------------end post routes-----------------------------------------------

});


//vue user routes
Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');
