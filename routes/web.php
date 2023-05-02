<?php

use App\Http\Controllers\Admin\Personal\CommentController;
use App\Http\Controllers\Admin\Personal\PersonalController;
use App\Http\Controllers\Admin\Posts\PostLikeController;
use App\Http\Controllers\SQl\SqlController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Di\DIController;
use App\Http\Controllers\Di\TestController;
use App\Http\Controllers\Main\OnePostController;
use App\Http\Controllers\VueJS\VueJsAxiosController;
use App\Http\Controllers\VueJS\VueJsController;
use App\Http\Livewire\TestLiveWire;
use App\Models\Post;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Service\TagService;
//use \App\Http\Controllers;
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

//DI
Route::get('/di', DIController::class)->name('di');
Route::get('/di/index', [TestController::class, 'index'])->name('di.test');
//SQL
Route::resource('/sql', SqlController::class);
//VUE - JS
Route::resource('/vue-js', VueJsController::class);
//Route::get('/vue-js-axios', VueJsAxiosController::class);
//Main
Route::namespace('\App\Http\Controllers\Main')->group(function () {
    Route::get('/', BaseController::class)->name('all_posts');
    Route::get('/post/{item}/', [OnePostController::class, 'show'])->name('one_post');
    Route::post('/post/{item}/', [OnePostController::class, 'add_comment'])->name('one_post.comment');
});

//Login
Route::get('/myauth', [\App\Http\Controllers\MyAuth\MyAuthController::class, 'login'])->name('myauth.login');
Route::post('/myauth/store', [\App\Http\Controllers\MyAuth\MyAuthController::class, 'login_store'])->name('myauth.store');

Route::get('/myauth/logout', [\App\Http\Controllers\MyAuth\MyAuthController::class, 'login_logout'])->name('myauth.logout');

Route::get('/myauth/registration', [\App\Http\Controllers\MyAuth\MyAuthController::class, 'registration'])->name('myauth.registration');
Route::post('/myauth/registration/accept', [\App\Http\Controllers\MyAuth\MyAuthController::class, 'registration_accept'])->name('myauth.registration.accept');

// Mail accept
Route::get('/email/verify', function () {
    return view('admin.login.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect()->route('admin.index');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');



//Admin                 App\Http\Controllers\Admin\Personal\PersonalController;
Route::namespace('\App\Http\Controllers\Admin')->prefix('admin')->middleware(['verified', 'user', 'admin'])->group(function () {

    Route::get('/', AdminIndexController::class)->name('admin.index');
//    Route::get('/{one}/{two}/', Posts\PostTestController::class)->name('admin.test');
    // Post
    Route::prefix('post')->group(function () {
        Route::get('/', Posts\PostAllController::class)->name('admin.posts.index');
        Route::get('/read/{item}/{page?}', Posts\PostReadController::class)->name('admin.posts.show');
        Route::get('/create', Posts\PostCreateGetController::class)->name('admin.posts.create');
        Route::post('/create', Posts\PostCreatePostController::class)->name('admin.posts.store');
        Route::get('/update/{item}/{page}', Posts\PostUpdateGetController::class)->name('admin.posts.edit');
        Route::patch('/update/{patch}/{page}', Posts\PostUpdatePostController::class)->name('admin.posts.update');
        Route::delete('/delete/{delete}', Posts\PostDeleteController::class)->name('admin.posts.destroy');

        Route::get('/like', [PostLikeController::class, 'index'])->name('admin.posts.like.index');
        Route::post('/like/{item}', [PostLikeController::class, 'store'])->name('admin.posts.like.store');
        Route::delete('/like/{item}', [PostLikeController::class, 'delete'])->name('admin.posts.like.delete');

        Route::get('/comment', [CommentController::class, 'index'])->name('admin.personal.comments.index');
        Route::delete('/comment/{item}', [CommentController::class, 'destroy'])->name('admin.personal.comments.destroy');

    });
    // Category
    Route::prefix('category')->group(function () {
        Route::get('/', Categories\CategoryAllController::class)->name('admin.categories.index');
        Route::get('/read/{item}/{page}', Categories\CategoryReadController::class)->name('admin.categories.show');
        Route::get('/create', Categories\CategoryCreateGetController::class)->name('admin.categories.create');
        Route::post('/create', Categories\CategoryCreatePostController::class)->name('admin.categories.store');
        Route::get('/update/{item}/{page}', Categories\CategoryUpdateGetController::class)->name('admin.categories.edit');
        Route::patch('/update/{patch}/{page}', Categories\CategoryUpdatePostController::class)->name('admin.categories.update');
        Route::delete('/delete/{delete}', Categories\CategoryDeleteController::class)->name('admin.categories.destroy');
    });
    // Tag
    Route::namespace('Tags')->prefix('tag')->group(function () {
        Route::get('/', TagAllController::class)->name('admin.tags.index');
        Route::get('/read/{item}/{page}', TagReadController::class)->name('admin.tags.show');
        Route::get('/create', TagCreateGetController::class)->name('admin.tags.create');
        Route::post('/create', TagCreatePostController::class)->name('admin.tags.store');
        Route::get('/update/{item}/{page}', TagUpdateGetController::class)->name('admin.tags.edit');
        Route::patch('/update/{patch}/{page}', TagUpdatePostController::class)->name('admin.tags.update');
        Route::delete('/delete/{delete}', TagDeleteController::class)->name('admin.tags.destroy');
    });
    // User
    Route::namespace('Users')->as('admin.')->group(function () {
        Route::resource('/users', UsersController::class);
    });
    // Personal
    Route::namespace('Personal')->prefix('personal')->group(function () {
        Route::get('/', [PersonalController::class, 'index'])->name('admin.personal.index');
//        Route::get('/read/{item}/{page}', Posts\PostReadController::class)->name('admin.posts.show');
//        Route::get('/create', Posts\PostCreateGetController::class)->name('admin.posts.create');
//        Route::post('/create', Posts\PostCreatePostController::class)->name('admin.posts.store');
//        Route::get('/update/{item}/{page}', Posts\PostUpdateGetController::class)->name('admin.posts.edit');
//        Route::patch('/update/{patch}/{page}', Posts\PostUpdatePostController::class)->name('admin.posts.update');
//        Route::delete('/delete/{delete}', Posts\PostDeleteController::class)->name('admin.posts.destroy');
    });
});

Route::prefix('admin')->group(function () {
    Route::get('/livewire', [TestLiveWire::class, 'render']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
