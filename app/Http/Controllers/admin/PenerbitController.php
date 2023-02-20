<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $penerbit = Penerbit::all();
        $count = count($penerbit);
        $code = 'P00' . $count + 1;
        return view('admin.penerbit.index' , compact('penerbit' , 'code'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $code = 'P00' . $count + 1;

            $penerbit = Penerbit::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'verif' => 'verified'
            ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function show(Penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penerbit $penerbit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $penerbit = penerbit::findOrFail($id);
        $penerbit->update([
            'nama' => $request->nama,

        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penerbit  $penerbit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penerbit = penerbit::findOrFail($id);
        $penerbit->delete();
        
        return redirect()->back();

    }
}
