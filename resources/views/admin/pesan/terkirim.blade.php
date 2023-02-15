@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#kirim-pesan">kirim pesan</button>

    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>penerima</th>
                    <th>Judul pesan</th>
                    <th>isi pesan </th>
                    <th>status pesan</th>
                    <th>tanggal kirim</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanTerkirim as $p)
                    <tr>
                        <td>{{  $loop->iteration }}</td>
                        <td>{{ $p->penerima->fullname }}</td>
                        <td>{{ $p->judul }}</td>
                        <td>{{ $p->isi }}</td>
                        <td>{{ $p->status }}</td>
                        <td>{{ $p->tgl_kirim }}</td>
                        {{-- <td>{{ $p->denda }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@include('admin/pesan/index');
@endsection
