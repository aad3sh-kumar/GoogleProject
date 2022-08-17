<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Str;

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

Route::get('/auth/{provider}/redirect', [UserController::class, 'SocialLogin']);

Route::get('/auth/{provider}/callback', [UserController::class, 'SocialCallback']);

Route::get('/', [DashboardController::class, 'Dashboard']);

Route::get('/login', [UserController::class, 'Login'])->name('login');

Route::post('/loginCheck', [UserController::class, 'PostLogin']);

Route::get('/register', [UserController::class, 'Register']);

Route::post('/registerCheck', [UserController::class, 'RegisterCheck']);

Route::get('/logout', [UserController::class, 'Logout']);

Route::get('/search', [SearchController::class, 'search']);

Route::post('/discussions/write/{id}', [DiscussionController::class, 'writeComment']);

Route::prefix('posts')->group(function() {

    Route::get('/{id}/vote/{type}', [PostController::class, 'vote']);

    Route::post('/delete/{post}', [PostController::class, 'deleteForm'])->middleware('auth');

    Route::post('/edit/{id}', [PostController::class, 'editPost']);

    Route::get('/view/{id}', [PostController::class, 'viewPost']);

    Route::post('/create', [PostController::class, 'CreatePost'])->middleware('auth');

    Route::get('/blog', [PostController::class, 'getBlogsbyAuthor']);

});

Route::prefix('user')->group(function() {

    Route::get('/view/{id}', [UserController::class, 'showProfile']);

    Route::post('/edit', [UserController::class, 'editProfile']);

    Route::post('/follow/{id}', [FollowerController::class, 'toggle']);

    Route::get('/index', [UserController::class, 'index']);

    Route::post('/notifications/delete/{id}', [NotificationController::class, 'delete']);

    Route::get('/notifications', [NotificationController::class, 'showNotifications']);

});