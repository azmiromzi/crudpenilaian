<?php

namespace App\Http\Controllers;

use App\Http\Middleware\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Pesan;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardadminController extends Controller
{
    public function dashboard()
    {
    //    $banyakuser = User::count();
       $banyakcategory = Category::count();
       $banyakpost = Post::count();
       $pesanan = Pesan::count();
       $menu = Menu::count();

        return view('dashboard', compact([ 'banyakcategory', 'banyakpost', 'pesanan', 'menu']));
    }
}
