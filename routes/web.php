<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminListPesananController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardadminController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesanMejaController;
use App\Http\Controllers\UserViewController;
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
    Route::get('/user', [UserViewController::class, 'dashboard'])->name('user');
    Route::get('/user/about', [UserViewController::class, 'about'])->name('user.about');
    Route::get('/user/service', [UserViewController::class, 'service'])->name('user.service');
    Route::get('/user/menu', [UserViewController::class, 'menu'])->name('user.menu');
    Route::get('/user/contact', [UserViewController::class, 'contact'])->name('user.contact');
    Route::get('/user/testimonial', [UserViewController::class, 'testimonial'])->name('user.testimonial');
    Route::get('user/menu/{pesan}', [UserViewController::class, 'pesanmenu'])->name('user.menu.pesan');
    Route::post('user/menu', [UserViewController::class, 'pesanmenustore'])->name('user.menu.pesan.store');
    Route::get('user/listpesanan', [UserViewController::class, 'list'])->name('user.listpesanan');


    // pesan meja
    Route::get('pesan/meja', [PesanMejaController::class, 'index'])->name('pesan.meja.index');
    Route::post('pesan/meja', [PesanMejaController::class, 'store'])->name('pesan.meja.store');
});
Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/dashboard', [DashboardadminController::class, 'dashboard'])->name('dashboard');

    Route::resource('/admin', AdminController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/mejas', MejaController::class);
    Route::resource('/pesanans', AdminListPesananController::class);

    Route::get('laporan-post', [AdminController::class, 'laporanpost'])->name('laporanpost');
    Route::get('posts-cetak', [AdminController::class, 'cetakpost'])->name('cetak-post');

    Route::get('laporan-user', [AdminController::class, 'laporanuser'])->name('laporanuser');
    Route::get('users-cetak', [AdminController::class, 'cetakuser'])->name('cetak-user');
    Route::get('posts/export', [AdminController::class, 'exportpost'])->name('excel-cetak-post');
    Route::get('users/export', [AdminController::class, 'export'])->name('excel-cetak-user');

});

require __DIR__.'/auth.php';
