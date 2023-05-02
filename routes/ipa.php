<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('posts')->namespace('App\Http\Controllers\Api\Posts')->group( function () {

    Route::get('/', PostIpaController::class)->name('ipa.posts.all');
});
