<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pesan;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function dashboard() {
        $menus1 = Menu::with('category')->where('category_id', 1)->get();
        $menus2 = Menu::with('category')->where('category_id', 2)->get();
        $menus3 = Menu::with('category')->where('category_id', 3)->get();
        return view('user.dashboarduser', compact(['menus1', 'menus2', 'menus3']));
    }
    public function about() {
        return view('user.aboutuser');
    }
    public function service() {
        return view('user.serviceuser');
    }
    public function contact() {
        return view('user.contactuser');
    }
    public function menu() {
        $menus1 = Menu::with('category')->where('category_id', 1)->get();
        $menus2 = Menu::with('category')->where('category_id', 2)->get();
        $menus3 = Menu::with('category')->where('category_id', 3)->get();
        return view('user.menuuser', compact(['menus1', 'menus2', 'menus3']));
    }
    public function testimonial() {
        return view('user.testimonialuser');
    }
    public function booking() {
        return view('user.bookinguser');
    }

    public function pesanmenu(Menu $pesan) {
        return view('user.detailpesan', compact('pesan'));
    }
    public function pesanmenustore(Request $request) {
        $validateData = $request->validate([
            'desc' => 'required',
            'status_id' => 'required',
            'menu_id' => 'required'
        ]);
        $validateData['user_id'] = auth()->user()->id;

        Pesan::create($validateData);
        return to_route('user');
    }


    public function list() {

        $lists = Pesan::with('user', 'status', 'menu')->where('user_id', auth()->user()->id)->get();

        return view('user.listpesanan', compact(['lists']));
    }
}
