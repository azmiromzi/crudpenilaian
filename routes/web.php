<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardadminController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\User;
use App\Models\Category;
use App\Models\Post;
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

Route::middleware(['auth', 'user'])->group(function() {
    // Route::resource('profile', ProfileController::class);
    Route::get('/user', function() {
        return view('user.index');
    })->name('user');

});
Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/dashboard', [DashboardadminController::class, 'dashboard'])->name('dashboard');

    Route::resource('/admin', AdminController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/categories', CategoryController::class);
    Route::get('laporan-post', [PostController::class, 'laporanpost'])->name('laporanpost');
    Route::get('posts-cetak', [PostController::class, 'cetak'])->name('cetak-post');

    Route::get('laporan-user', [AdminController::class, 'laporanuser'])->name('laporanuser');
    Route::get('users-cetak', [AdminController::class, 'cetakuser'])->name('cetak-user');
    Route::get('users/export', [AdminController::class, 'export'])->name('excel-cetak-user');
    Route::get('posts/export', [AdminController::class, 'exportpost'])->name('excel-cetak-post');

});

require __DIR__.'/auth.php';
