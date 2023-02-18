<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\pesan;
use Illuminate\Http\Request;

class PesanApiController extends Controller
{
    public function index()
    {
        $pesan = pesan::all();

        return response()->json([
            'data' => $pesan
        ]);
    }

    public function store(Request $request)
    {
        $pesan = Pesan::Create($request->all());

        return response()->json([
            'msg' => 'pesan created',
            'data' => $pesan
        ]);
    }

    public function update($id)
    {
        $pesan = Pesan::all();
        $pesan->update([
            'status' => 'terbaca'
        ]);

        return response()->json([
            'msg' => 'pesan updated',
            'data' => $pesan
        ]);
    }
}
