<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::controller(UserController::class)->group(function(){
    Route::post('/login','login');
    Route::post('/register','register');
});

Route::controller(PostController::class)
->prefix('/posts')
->group(function(){
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('/','store');
        Route::post('/{id}','update');
        Route::delete('/{id}','destroy');
    });
    Route::get('/trending', 'showLatestPosts');
    Route::get('/','index');
    Route::get('/{id}','show');

});

Route::controller(UserController::class)
->middleware('auth:sanctum')
->group(function(){
    Route::get('/current-user', 'userRefresh');
});
