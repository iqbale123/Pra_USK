<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\peminjaman;
use Illuminate\Http\Request;

class PeminjamanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = peminjaman::all();

        return response()->json([
            'data' => $peminjaman
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $peminjaman = Peminjaman::create([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'kondisi_buku_saat_dipinjam' => $request->kondisi_buku_saat_dipinjam
        ]);

        $buku = buku::where('id' , $request->buku_id)->first();
        if ($request->kondisi_buku_saat_dipinjam == 'baik') {
            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik -1
            ]);
        }

        if ($request->kondisi_buku_saat_dipinjam == 'rusak') {
            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak -1
            ]);
        }

        return response()->json([
            'msg' => 'peminjaman created',
            'data' => $peminjaman
        ]);
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
    public function destroy($id)
    {
        //
    }
}
L
