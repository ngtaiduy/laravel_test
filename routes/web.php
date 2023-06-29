<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryPostController;
use App\Http\Controllers\UserController;
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
})->name('home');

Route::get('login', [UserController::class, 'loginForm'])->name('login');
Route::post('login', [UserController::class, 'postLogin']);
Route::any('logout', [UserController::class, 'actionLogOut'])->name('logout');

Route::get('register', [UserController::class, 'registerForm'])->name('register');
Route::post('register', [UserController::class, 'saveRegister']);
Route::get('change-password', [UserController::class, 'changePasswordForm'])->name('change-password');
Route::post('change-password', [UserController::class, 'saveChangePassword']);

Route::get('admin/list-user', [AdminController::class, 'getListUser'])->name('admin.get-list-user');
Route::get('admin/edit-user/{id}', [AdminController::class, 'editUser'])->name('admin.edit-user');
Route::post('admin/edit-user/{id}', [AdminController::class, 'saveEditUser']);

Route::get('admin/list-category-post', [CategoryPostController::class, 'getListCategoryPost'])->name('admin.get-list-category-post');
Route::get('admin/edit-category-post/{id}', [CategoryPostController::class, 'editCategoryPost'])->name('admin.edit-category-post');
Route::post('admin/edit-category-post/{id}', [CategoryPostController::class, 'saveEditCategoryPost']);