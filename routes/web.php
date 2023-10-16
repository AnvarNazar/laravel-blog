<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

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

Route::prefix("/admin")->group(function () {
    Route::get("/", [AdminController::class, "index"])->name("admin-page");
    Route::prefix("/posts")->group(function () {
        Route::get("/", [PostController::class, "index"])->name("admin-posts-page");
        Route::get("/create", [PostController::class, "create"])->name("admin-posts-create-page");
        Route::post("/store", [PostController::class, "store"])->name("admin-posts-store");
    });
});


Route::prefix("/images")->group(function () {
    Route::post("/store", [ImageController::class, "store"])->name("images-store");
});
