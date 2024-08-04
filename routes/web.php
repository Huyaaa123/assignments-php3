<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TinController;
use App\Http\Controllers\UserArticleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsMember;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [TinController::class, 'index'])->name('index');
Route::get('/chinh-tri', [TinController::class, 'ctri'])->name('chinh-tri');
Route::get('/chinh-tri/chi-tiet/{id}', [TinController::class, 'chitietct']);
Route::get('/the-thao', [TinController::class, 'tthao']);
Route::get('/the-thao/chi-tiet/{id}', [TinController::class, 'chitiettt']);
Route::get('/thoi-su', [TinController::class, 'tsu']);
Route::get('/thoi-su/chi-tiet/{id}', [TinController::class, 'chitietts']);






Route::get('/search', [TinController::class, 'search'])->name('search');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware(['auth', IsAdmin::class]);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware(['auth', IsAdmin::class]);
Route::get('/member', [MemberController::class, 'dashboard'])->name('member.dashboard')->middleware(['auth', IsMember::class]);

//admin
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('/admin/tin', [ArticleController::class, 'index'])->name('admin.tin');
Route::get('/admin/loaitin', [CategoryController::class, 'index'])->name('admin.loaitin');
Route::get('/admin/binhluan', [CommentController::class, 'index'])->name('admin.comments');


//crud user
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('admin/users/store', [UserController::class, 'store'])->name('admin.users.store');

Route::get('admin/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('admin/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');

Route::delete('admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');

//category
Route::get('/admin/loaitin/create', [CategoryController::class, 'create'])->name('admin.loaitin.create');
Route::post('admin/loaitin/store', [CategoryController::class, 'store'])->name('admin.loaitin.store');

Route::get('admin/loaitin/edit/{id}', [CategoryController::class, 'edit'])->name('admin.loaitin.edit');
Route::put('admin/loaitin/update/{id}', [CategoryController::class, 'update'])->name('admin.loaitin.update');

Route::delete('admin/loaitin/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.loaitin.destroy');

//tin
Route::get('/admin/tin/create', [ ArticleController::class, 'create'])->name('admin.tin.create');
Route::post('admin/tin/store', [ ArticleController::class, 'store'])->name('admin.tin.store');

Route::get('admin/tin/edit/{id}', [ ArticleController::class, 'edit'])->name('admin.tin.edit');
Route::put('admin/tin/update/{id}', [ ArticleController::class, 'update'])->name('admin.tin.update');

Route::delete('admin/tin/delete/{id}', [ ArticleController::class, 'destroy'])->name('admin.tin.destroy');

//cmt
Route::get('/admin/comments/create', [ CommentController::class, 'create'])->name('admin.comments.create');
Route::post('admin/comments/store', [ CommentController::class, 'store'])->name('admin.comments.store');

Route::get('admin/comments/edit/{id}', [ CommentController::class, 'edit'])->name('admin.comments.edit');
Route::put('admin/comments/update/{id}', [ CommentController::class, 'update'])->name('admin.comments.update');

Route::delete('admin/comments/delete/{id}', [ CommentController::class, 'destroy'])->name('admin.comments.destroy');

//cmt-user
// routes/web.php
Route::post('/comments/store', [TinController::class, 'storeComment'])->name('user.comments.store');







