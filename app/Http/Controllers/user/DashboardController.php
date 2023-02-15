<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\kategori;
use App\Models\pemberitahuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pemberitahuan = pemberitahuan::where('status', 'aktif')->get();
        // $kategori = kategori::all();
        $buku = buku::all();
        return view('user.dashboard', compact('pemberitahuan','buku'));
    }
}
