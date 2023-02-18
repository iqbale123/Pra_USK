<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\identitas;
use Illuminate\Http\Request;

class IdentitasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $identitas = identitas::all();

        return response()->json([
            'data' => $identitas
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $identitas = Identitas::first();

        if ($request->foto == null) {
            $identitas->update([
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'nomor_hp' => $request->nomor_hp,
                'alamat_app' => $request->alamat_app,
            ]);
        } else {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/identitas/'), $imageName);
            $identitas->update([
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'nomor_hp' => $request->nomor_hp,
                'alamat_app' => $request->alamat_app,
                "foto" => $imageName
            ]);
        }

        return response()->json([
            'msg' => 'Berhasil mengedit identitas',
            'data' => $identitas
        ]);
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
