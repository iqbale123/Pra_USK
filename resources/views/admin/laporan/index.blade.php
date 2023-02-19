@extends('layouts.master')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Laporan Perpustakaan</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Peminjaman Buku</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Pengembalian Buku</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Nama Anggota</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                {{-- peminjaman --}}
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="{{ route('admin.cetak.peminjaman') }}" method="post">
                        @csrf
                        <input type="date" class="form-control mb-3 mt-3" name="tanggal_peminjaman">
                        <button type="submit" class="btn btn-danger">cetak pdf</button>
                    </form>
                </div>
                {{-- Pengembalian --}}
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <form action="{{ route('admin.cetak.pengembalian') }}" method="post">
                        @csrf
                        <input type="date" class="form-control mb-3 mt-3" name="tanggal_pengembalian">
                        <button type="submit" class="btn btn-danger">cetak pdf</button>
                    </form>
                </div>
                {{-- peranggota --}}
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <form action="{{ route('admin.cetak.anggota') }}" method="post">
                        @csrf

                        <select name="user_id" id="" class="form-select mb-3 mt-3">

                            <option>Pilih Opsi</option>

                            @foreach($anggota as $a)
                            <option value="{{$a->id}}">{{$a->fullname}}</option>

                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-danger">cetak pdf</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--excel--}}
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Laporan Perpustakaan</h5>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="peminjaman-tab" data-bs-toggle="tab" href="#peminjaman" role="tab"
                            aria-controls="peminjaman" aria-selected="true">Peminjaman Buku</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#pengembalian" role="tab"
                            aria-controls="pengembalian" aria-selected="false">Pengembalian Buku</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="anggota-tab" data-bs-toggle="tab" href="#anggota" role="tab"
                            aria-controls="anggota" aria-selected="false">Nama Anggota</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    {{-- peminjaman --}}
                    <div class="tab-pane fade show active" id="peminjaman" role="tabpanel" aria-labelledby="peminjaman-tab">
                        <form action="{{ route('admin.cetak.peminjaman.excel') }}" method="post">
                            @csrf
                            <input type="date" class="form-control mb-3 mt-3" name="tanggal_peminjaman">
                            <button type="submit" class="btn btn-success">cetak excel</button>
                        </form>
                    </div>
                    {{-- Pengembalian --}}
                    <div class="tab-pane fade" id="pengembalian" role="tabpanel" aria-labelledby="pengembalian-tab">
                        <form action="{{ route('admin.cetak.pengembalian.excel') }}" method="post">
                            @csrf
                            <input type="date" class="form-control mb-3 mt-3" name="tanggal_pengembalian">
                            <button type="submit" class="btn btn-success">cetak excel</button>
                        </form>
                    </div>
                    {{-- peranggota --}}
                    <div class="tab-pane fade" id="anggota" role="tabpanel" aria-labelledby="anggota-tab">
                        <form action="{{ route('admin.cetak.anggota.excel') }}" method="post">
                            @csrf

                            <select name="user_id" id="" class="form-select mb-3 mt-3">

                                <option>Pilih Opsi</option>

                                @foreach($anggota as $a)
                                <option value="{{$a->id}}">{{$a->fullname}}</option>

                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success">cetak excel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
