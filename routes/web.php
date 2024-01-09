<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Models\Rol;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ViewErrorBag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [homeController::class, 'index']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'showLoginView')->middleware('guest');
    Route::post('/login', 'store')->middleware('guest');
    Route::post('/logout', 'destroySession')->middleware('auth');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'showRegisterView')->middleware('guest')->name('register');
    Route::post('/storeUser', 'store');
});

Route::controller(PostsController::class)->group(function () {
    Route::get('/home', 'showAllPosts')->middleware('auth');
    Route::get('/myPosts', 'showPosts')->middleware('auth');
    Route::get('/viewPost/{id}', 'showPost')->middleware('auth');
    Route::get('/editPost/{id}', 'editPostView')->middleware('auth');
    Route::get('/viewCreatePost', 'viewCreatePost')->middleware('auth');
    Route::put('/editPost/{id}', 'updatePost');
    Route::post('/createPost', 'createPost');
    Route::post('/deletePost/{id}', 'deletePost');
});

// TO DO VERIFICAR ELFUNCIONAMINETO DE LA FUNCION CRATE POST 