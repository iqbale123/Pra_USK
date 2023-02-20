<?php

namespace App\Http\Controllers;

use App\Models\pesan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexMasuk()
    {
        $pesanMasuk = Pesan::where('pengirim_id' , '!=' , Auth::user()->id)->where('penerima_id' , Auth::user()->id)->get();
        return view('user.pesan.masuk' , compact('pesanMasuk'));
    }

    public function indexAdminMasuk()
    {
        $pesanMasuk = Pesan::where('pengirim_id' , '!=', Auth::user()->id)->where('penerima_id' , Auth::user()->id)->get();

        return view('admin.pesan.masuk' ,compact('pesanMasuk'));
    }

    public function indexTerkirim()
    {
        $pesanTerkirim = Pesan::where('penerima_Id' , '!=' , Auth::user()->id)->where('pengirim_id' , Auth::user()->id)->get();
        $penerima = User::where('role' , 'admin')->get();

        return view('user.pesan.terkirim' , compact('pesanTerkirim' , 'penerima'));
    }

    public function indexAdminTerkirim()
    {
        $pesanTerkirim = Pesan::where('penerima_Id' , '!=' , Auth::user()->id)->where('pengirim_id' , Auth::user()->id)->get();
        $penerima = User::where('role' , 'user')->get();

        return view('admin.pesan.terkirim' ,compact('pesanTerkirim' , 'penerima'));
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
    public function kirimPesan(Request $request)
    {
        $pesanTerkirim = Pesan::where('penerima_Id' , '!=', Auth::user()->id)->where('pengirim_id' , Auth::user()->id)->get();
        $penerima = User::where('role' , 'admin')->get();
        $pesanTerkirim = Pesan::create([
            'penerima_id' => $request->penerima_id,
            'pengirim_id' => $request->pengirim_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => 'terkirim',
            'tgl_kirim' => now()
        ]);

        return redirect()->back();
    }

    public function kirimPesanAdmin(Request $request)
    {
        $pesanTerkirim = Pesan::where('penerima_Id' , '!=', Auth::user()->id)->where('pengirim_id' , Auth::user()->id)->get();
        $penerima = User::where('role' , 'user')->get();
        $pesanTerkirim = Pesan::create([
            'penerima_id' => $request->penerima_id,
            'pengirim_id' => $request->pengirim_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => 'terkirim',
            'tgl_kirim' => Carbon::now()
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesan $pesan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesan $pesan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $status = Pesan::where('id' , $request->id)->first();
        $status->update([
            'status' => 'dibaca'
        ]);

        return redirect()->back();
    }

    public function updateStatusAdmin(Request $request, Pesan $pesan)
    {
        $status = Pesan::where('id' , $request->id)->first();
        $status->update([
            'status' => 'dibaca'
        ]);

        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesan  $pesan
     * @return \Illuminate\Http\Response
     */
    public function destroyPesan($id)
    {
        $pesanTerkirim = Pesan::find($id);
        $pesanTerkirim->delete();

        return redirect()->back();
    }

}
