<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\UsersController;

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


Route::group(['namespace' => 'App\Http\Controllers'], function() {
    Route::get('/', function () {
        return view('home');
    })->name('home.index');
    
    Route::group(['middleware' => ['guest']], function() {
        Route::get('/register', [AuthController::class, 'register'])->name('register');
        Route::post('register', [AuthController::class, 'storeRegister'])->name('register');
        
        Route::get('/login', [AuthController::class, 'login'])->name('login');
        Route::post('login', [AuthController::class, 'storelogin'])->name('login');
    });

    Route::group(['middleware' => ['auth', 'permission']], function() {

        Route::group(['prefix' => 'users'], function() {
            Route::get('/', [UsersController::class, 'index'])->name('users.index');
            Route::get('/create', [UsersController::class, 'create'])->name('users.create');
            Route::post('create', [UsersController::class, 'store'])->name('users.store');
            Route::get('/{user}/show', [UsersController::class, 'show'])->name('users.show');
            Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit');
            Route::patch('/{user}/update', [UsersController::class, 'update'])->name('users.update');
            Route::delete('/{user}/delete', [UsersController::class, 'destroy'])->name('users.destroy');
            Route::get('/me', function(Request $request) {
                return $request->user();
            });
        });
    
        Route::group(['prefix' => 'manage/articles'], function() {
            Route::get('/create', [BlogPostController::class, 'create'])->name('posts.create');
            Route::post('create', [BlogPostController::class, 'store'])->name('posts.store');
            Route::get('/{post}/edit', [BlogPostController::class, 'edit'])->name('posts.edit');
            Route::patch('/{post}/update', [BlogPostController::class, 'update'])->name('posts.update');
        });

        
        Route::resource('roles', RolesController::class);
        Route::resource('permissions', PermissionsController::class);
    });

    Route::get('/articles', [BlogPostController::class, 'index'])->name('posts.index');
    Route::get('/articles/{slug}', [BlogPostController::class, 'single'])->name('posts.single');

    Route::group(['middelware' => ['auth']], function() {
        Route::post('/follow/{user}', [UsersController::class, 'follow'])->name('users.follow');
        Route::get('/logout', [AuthController::class, 'destroySession'])->name('logout');
    });
    
    
});
