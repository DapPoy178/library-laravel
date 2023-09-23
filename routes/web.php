<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\BookRentController;

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

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('profile', [UserController::class, 'show'])->middleware(['only_client']);

    Route::middleware('only_admin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index']);
        Route::get('books', [BooksController::class, 'index']);
        Route::get('books-add', [BooksController::class, 'add']);
        Route::post('books-add', [BooksController::class, 'store']);

        Route::get('/books-edit/{slug}', [BooksController::class, 'edit']);
        Route::put('/books-edit/{slug}', [BooksController::class, 'update']);

        Route::get('/books-destroy/{slug}', [BooksController::class, 'destroy']);
        Route::get('/books-deleted', [BooksController::class, 'deletedBook']);
        Route::get('/books-restore/{slug}', [BooksController::class, 'restore']);

        Route::get('categories', [CategoriesController::class, 'index']);
        Route::post('categories-add', [CategoriesController::class, 'store']);

        Route::get('/categories-edit/{slug}', [CategoriesController::class, 'edit']);
        Route::put('/categories-edit/{slug}', [CategoriesController::class, 'update']);

        Route::get('/categories-delete/{slug}', [CategoriesController::class, 'delete']);
        Route::get('categories-deleted', [CategoriesController::class, 'deletedCategory']);
        Route::get('categories-restore/{slug}', [CategoriesController::class, 'restore']);


        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-users', [UserController::class, 'registeredUsers']);

        Route::get('/user-details-approve/{slug}', [UserController::class, 'userApprove']);
        Route::get('/user-approve/{slug}', [UserController::class, 'approveUser']);

        Route::get('/user-details/{slug}', [UserController::class, 'userDetails']);

        Route::get('/user-ban/{slug}', [UserController::class, 'banUser']);
        Route::get('banned-users', [UserController::class, 'bannedUser']);
        Route::get('/unban-users/{slug}', [UserController::class, 'restore']);


        Route::get('book-rent', [BookRentController::class, 'index']);
        Route::post('book-rent', [BookRentController::class, 'store']);

        Route::get('book-return', [BookRentController::class, 'bookReturnShow']);
        Route::post('book-return', [BookRentController::class, 'bookReturn']);

        Route::get('rentlog', [RentLogController::class, 'index']);
    });
});
