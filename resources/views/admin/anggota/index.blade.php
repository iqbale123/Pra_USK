@extends('layouts.master')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Anggota</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-anggota">Tambah Anggota</button>
        </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Anggota</th>
                            <th>Nis</th>
                            <th>Nama Anggota</th>
                            <th>Nama Lengkap</th>
                            <th>Kelas</th>
                            <th>Foto</th>
                            <th>Alamat </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggota as $a)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->kode }}</td>
                            <td>{{ $a->nis }}</td>
                            <td>{{ $a->username }}</td>
                            <td>{{$a->fullname  }}</td>
                            <td>{{ $a->kelas }}</td>
                            <td>{{ $a->alamat  }}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#update-anggota{{ $a->id }}">update</button>
                           <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-anggota{{ $a->id }}">delete</button>
                        </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@include('/admin/anggota/create')
@include('/admin/anggota/delete')
@include('/admin/anggota/edit')
@endsection
