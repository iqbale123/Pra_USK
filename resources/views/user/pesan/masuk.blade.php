@extends('layouts.master')
@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-9">
            <h3>Pesan Masuk</h3>
            <p class="text-subtitle text-muted">Kirim Pesan Ke Admin</p>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Pengirim</th>
                            <th>Judul Pesan</th>
                            <th>Isi Pesan</th>
                            <th>Status Pesan</th>
                            <th>Tanggal Kirim</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pesanMasuk as $key => $m)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $m->pengirim->fullname }}</td>
                                <td>{{ $m->judul }}</td>
                                <td>{{ $m->isi }}</td>
                                <td>{{ $m->status == 'terkirim' ? 'Belum Dibaca' : 'Terbaca' }}</td>
                                <td>{{ $m->tgl_kirim }}</td>
                                {{-- <td><button class="btn btn-success"><i class="bi bi-check-lg"></i></button></td> --}}
                                <td>
                                    @if ($m->status == 'terkirim')
                                        <form action="{{ route('user.pesan.masuk.update', ['id' => $m->id]) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="penerima_id" value="{{ Auth::user()->id }}">
                                            <button type="submit" class="btn btn-success">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        </form>
                                    @else
                                    <form method="post" action="{{ route('user.pesan.delete', $m->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{-- </div> --}}
    </div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="/assets/css/pages/simple-datatables.css">
    </head>

    <body>
        <script src="assets/js/app.js"></script>
        <script src="/assets/js/extensions/simple-datatables.js"></script>
    </body>

    </html>
@endsection
