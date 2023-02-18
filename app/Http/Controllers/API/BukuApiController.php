<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\buku;
use Illuminate\Http\Request;

class BukuApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = buku::all();

        return response()->json([
            'data' => $buku
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
        $buku = Buku::all();
        $buku = Buku::create($request->all());

        return response()->json([
            'msg' => 'data created',
            'data' => $buku
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
        $buku = Buku::find($id);
        $buku->update($request->all());


        return response()->json([
            'msg' => 'data updated',
            'data' => $buku
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
            $buku = Buku::find($id);
            $buku->delete();

            return response()->json([
            'msg' => 'data deleted',
            'data' => $buku
        ]); 
    }
}
