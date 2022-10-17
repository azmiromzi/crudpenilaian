<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminListPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = Pesan::with('status', 'user', 'menu')->get();
        return view('admin.pesanan.index', compact(['pesanans']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesan $pesanan)
    {
        $statuses = Status::get();
        return view('admin.pesanan.edit', compact(['pesanan', 'statuses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesan $pesanan)
    {
        $validateData = $request->validate([
            'desc' => 'required',
            'status_id' => 'required',
            'menu_id' => 'required',
            'user_id' => 'required'
        ]);

        $pesanan->update($validateData);
        return to_route('pesanans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $pesanan)
    {
        $pesanan->delete();
        return to_route('pesanans.index');
    }
}
