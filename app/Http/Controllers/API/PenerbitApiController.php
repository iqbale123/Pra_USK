<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\penerbit;
use Illuminate\Http\Request;

class PenerbitApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = penerbit::all();
        return response()->json([
            'data' => $penerbit
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
        $penerbit = Penerbit::all();
        $count = count($penerbit);
        $code = 'P00'. $count + 1;

        $penerbit = Penerbit::create([
            'kode' => $code,
            'verif' => 'verified',
            'nama' => $request->nama
        ]);

        return response()->json([
            'msg' => 'data created',
            'data' => $penerbit
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
        $penerbit = penerbit::findOrFail($id);
        $penerbit->update([
            'nama' => $request->nama,

        ]);
        return response()->json([
            'msg' => 'data updated',
            'data' => $penerbit
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
        $penerbit = penerbit::findOrFail($id);
        $penerbit->delete();
        return response()->json([
            'msg' => 'data deleted',
            'data' => $penerbit
        ]);
    }
}
