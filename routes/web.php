<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\langController;
use App\Http\Controllers\likesController;
use App\Http\Controllers\postController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\userController;
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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile/{id}', [profileController::class, 'show'])->name('profile');
Route::post('/logout', [profileController::class, 'logout'])->name('logout');
Route::get('/profile/{id}/edit', [profileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{id}', [userController::class, 'update'])->name('profile.update');
Route::post('/profile/{id}/create-post', [postController::class , 'store'])->name('post.create');
Route::get('/profile/{id}/create-post', [postController::class, 'create']);
Route::delete('user/{id}', [profileController::class , 'destroy'])->name('user.delete');
Route::delete('/post/{id}/delete', [postController::class , 'destroy'])->name('post.delete');
Route::post('/post/{id}/comment', [commentController::class, 'store']);
Route::get('/post/{id}/comments', [postController::class , 'show'])->name('posts.show');
Route::post('/post/{id}/comment', [commentController::class , 'store'])->name('comment.add');
Route::post('/post/{id}/like', [likesController::class, 'store'])->name('post.like');
Route::get('lang/home', [langController::class, 'index']);
Route::get('lang/change', [langController::class, 'change'])->name('changeLang');
