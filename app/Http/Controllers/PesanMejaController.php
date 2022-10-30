<?php

namespace App\Http\Controllers;

use App\Models\pesanMeja;
use Illuminate\Http\Request;

class PesanMejaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.pesanmeja.bookinguser');
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
     * @param  \App\Models\pesanMeja  $pesanMeja
     * @return \Illuminate\Http\Response
     */
    public function show(pesanMeja $pesanMeja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pesanMeja  $pesanMeja
     * @return \Illuminate\Http\Response
     */
    public function edit(pesanMeja $pesanMeja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pesanMeja  $pesanMeja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pesanMeja $pesanMeja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pesanMeja  $pesanMeja
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesanMeja $pesanMeja)
    {
        //
    }
}
