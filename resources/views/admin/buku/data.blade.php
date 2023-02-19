@extends('layouts.master')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Data Buku</h3>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-buku">Tambah Buku</button>
    </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Buku Baik</th>
                <th>Buku Rusak</th>
                {{-- <th>Foto</th> --}}
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($buku as $b)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->pengarang }}</td>
                    <td>{{ $b->penerbit->nama }}</td>
                    <td>{{ $b->j_buku_baik }}</td>
                    <td>{{ $b->j_buku_rusak }}</td>
                    {{-- <td>{{ $b->foto }}</td> --}}
                    <td>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#update-buku{{ $b->id }}">update</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-buku{{ $b->id }}">delete</button></td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

@include('admin/buku/data_create')
@include('admin/buku/data_edit')
@include('admin/buku/data_delete')

@endsection
