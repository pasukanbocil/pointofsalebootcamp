<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');

Route::get('/about', function () {
    $data = [
        'pageTitle' => 'Tentang Kami',
        'content' => 'Ini adalah halaman tentang kami.'
    ];
    return view('about', $data);
});

Route::get('/product', [ProductController::class, 'index'])
    ->middleware('auth', 'admin');
Route::get('/product/create', [ProductController::class, 'create'])
    ->middleware('auth', 'admin');
Route::post('/product', [ProductController::class, 'store'])
    ->middleware('auth', 'admin');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])
    ->middleware('auth', 'admin');
Route::put('/product/{id}', [ProductController::class, 'update'])
    ->middleware('auth', 'admin');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])
    ->middleware('auth', 'admin');


Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::put('/user/{id}', [UserController::class, 'update']);
Route::delete('/user/{id}', [UserController::class, 'destroy']);


Route::get('/profile', [UserController::class, 'profile']);

Route::get('/category', [CategoriesController::class, 'index'])
    ->middleware('auth', 'admin');
Route::get('/category/create', [CategoriesController::class, 'create'])
    ->middleware('auth', 'admin');
Route::post('/category', [CategoriesController::class, 'store'])
    ->middleware('auth', 'admin');
Route::get('/category/{id}/edit', [CategoriesController::class, 'edit'])
    ->middleware('auth', 'admin');
Route::put('/category/{id}', [CategoriesController::class, 'update'])
    ->middleware('auth', 'admin');
Route::delete('/category/{id}', [CategoriesController::class, 'destroy'])
    ->middleware('auth', 'admin');
