@extends('layouts.master')
@section('content')
      <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Form Peminjaman Buku</h4>
                  </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal" action="{{ route('user.peminjaman.form.submit') }}" method="POST">
                        @csrf
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <label>Nama Anggota</label>
                            </div>
                            <div class="col-md-8 form-group">
                              <input
                                type="text"
                                class="form-control"
                                name="fullname"
                                value="{{ Auth::user()->fullname }}" disabled
                              />
                            </div>
                            <div class="col-md-4">
                              <label>Judul Buku</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select name="buku_id" id="" class="form-select">

                                    <option >Pilih Opsi</option>

                                    @foreach($buku as $b)
                                    <option value="{{$b->id}}" >{{$b->judul}}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                              <label>Tanggal Peminjaman</label>
                            </div>
                            <div class="col-md-8 form-group">
                              <input
                                type="date"
                                class="form-control"
                                value="{{ date('Y-m-d') }}"
                                name="tanggal_peminjaman"
                                disabled
                                readonly
                              />
                            </div>
                            <div class="col-md-4">
                              <label>Kondisi Buku Saat Dipinjam</label>
                            </div>
                            <div class="col-md-8 form-group">
                                <select class="form-select" name="kondisi_buku_saat_dipinjam">
                                    <option value="" disabled selected >Pilih Opsi</option>
                                    <option value="baik">Baik</option>
                                    <option value="rusak">rusak</option>
                                </select>
                            </div>

                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <button type="submit" class="btn btn-primary me-1 mb-1">
                                Submit
                                </button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
@endsection
