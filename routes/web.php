<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Route::middleware(['auth'])->group(function() {
    // Route::resource('profile', ProfileController::class);
    Route::get('/user', function() {
        return view('user.index');
    })->name('user');

});
Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'banyakpost' => Post::count(),
        ]);
    })->name('dashboard');

    Route::resource('/admin', AdminController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/categories', CategoryController::class);
    Route::get('posts-cetak', [PostController::class, 'cetak'])->name('cetak');

});

require __DIR__.'/auth.php';
