<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;

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
    return view('dashboard', ['posts' => Post::all()]);
})->name('dashboard');

Route::get('/search', [PostController::class, 'search'])->name('search');

Route::get('/new_post', function () {
    return view('new-post');
})->middleware('role:client')->name('new-post');

Route::get('/users_list', function () {
    return view('users-list', ['users' => User::all()]);
})->middleware('role:admin')->name('users-list');

Route::get('/post/{id}', [PostController::class, 'show']);

Route::post('/new_post', [PostController::class, 'store'])->middleware('auth')->name('new-post');

Route::delete('/delete_post/{post}', [PostController::class, 'delete'])->middleware('role:client,mod')->name('delete-post');

Route::delete('/delete_images', [ImageController::class, 'delete'])->middleware('role:client')->name('delete-images');

Route::get('/edit_post/{post}', function (Post $post) {
    return view('edit-post', ['post' => $post]);
})->middleware('role:client')->name('edit-post');

Route::post('/edit_post/{post}', [PostController::class, 'edit'])->middleware('role:client')->name('edit-post');

Route::post('/change_roles', [UserController::class, 'change_roles'])->middleware('role:admin')->name('change-roles');

Route::post('/new_message', [MessageController::class, 'store'])->middleware('auth')->name('new-message');

require __DIR__ . '/auth.php';
