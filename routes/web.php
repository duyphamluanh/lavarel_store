<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\Users\MainController;

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
    return view('welcome');
});

Route::get('/admin/users/login', [ LoginController::class , 'index'])->name('login');
Route::post('/admin/users/login/store', [ LoginController::class , 'store']);
Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/', [ MainController::class , 'index'])->name('admin');
        Route::get('/main', [ MainController::class , 'index']);

        #Menu
        Route::prefix('/menu')->group(function(){
            Route::get('/add', [ MenuController::class , 'create']);
            Route::post('/add', [ MenuController::class , 'store']);

            Route::get('/list', [ MenuController::class , 'index']);

            Route::DELETE('/destroy', [ MenuController::class , 'destroy']);

            Route::get('/edit/{menu}', [ MenuController::class , 'edit']);
            Route::post('/edit/{menu}', [ MenuController::class , 'update']);
        });

        #Product
        Route::prefix('/product')->group(function(){
            Route::get('/add', [ ProductController::class , 'create']);
            Route::post('/add', [ ProductController::class , 'store']);

            Route::get('/list', [ ProductController::class , 'index']);

            Route::DELETE('/destroy', [ ProductController::class , 'destroy']);

            Route::get('/edit/{product}', [ ProductController::class , 'edit']);
            Route::post('/edit/{product}', [ ProductController::class , 'update']);
        });

        #Upload
        Route::post('/upload/services', [ UploadController::class , 'store']);
    });
});

// Logout route
Route::get('/logout', [ MainController::class , 'logout']);
