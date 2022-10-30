<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use App\Models\MuatanMeja;
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
        $muatans = MuatanMeja::get();
        $nama_meja = Meja::get();
        return view('user.pesanmeja.bookinguser', compact(['muatans', 'nama_meja']));
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
        $validateData = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['email', 'string', ],
            'tanggal_pesan' => ['required'],
            'special_request' => ['nullable', 'string', 'max:100'],
            'muatan_id ' => ['string'],
            'meja_id' => ['string']
        ]);
        $validateData['user_id'] = auth()->user()->id;

        pesanMeja::create($validateData);
        return redirect()->back();
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
