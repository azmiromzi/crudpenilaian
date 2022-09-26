<?php

namespace App\Http\Controllers;

use <<<<<<< HEAD
use App\Exports\PostExport;
use App\Exports\UsersExport;
=======
use App\Models\Post;
>>>>>>> 8109a0e9a20113c007cbb55020a4fcaddf8f1f48
use App\Models\User;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::where('is_admin', 0)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', ],
        ]);
        $validate['password'] = Hash::make($request->password);
        $validate['is_admin'] = 1;

        User::create($validate);
        return redirect()->route('admin.index')->with('success', 'admin creates successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $admin)
    {
        return view('admin.users.view', [
            'admin' => $admin
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'users delete');
    }
    public function laporanuser() {
        return view('admin.users.laporan', [
            'users' => User::get(),
        ]);
    }
    public function cetakuser() {
       $users = User::get();

       $pdf   = PDF::loadview('admin.users.cetak', ['users' => $users]);
       return $pdf->download('laporan-pegawai-user-pdf.pdf');
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function exportpost()
    {
        return Excel::download(new PostExport, 'posts.xlsx');
    }

    public function laporanpost() {
        return view('admin.posts.laporan', [
            'posts' => Post::get(),
        ]);
    }

    public function cetakpost()
    {

        $posts = Post::get();
        $pdf   = PDF::loadview('admin.posts.cetak', ['posts' => $posts]);
        return $pdf->download('laporan-pegawai-pdf.pdf');
    }
