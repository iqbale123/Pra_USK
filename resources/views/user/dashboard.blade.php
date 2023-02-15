@extends('layouts.master')
@section('content')

<div class="row">
    <div class="container">
        <div class="row">
            @foreach ($pemberitahuan as $p)
                <div class="alert alert-warning alert-dismissible fade show">
                    <strong>Selamat datang! </strong>{{ $p->isi }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach


            @foreach ($buku as $b)
                <div class="col-4">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <div class="card-content">
                        <img src="/assets/images/samples/banana.jpg" class="card-img-top img-fluid" alt="singleminded"/>
                        <div class="card-body">
                            <h3 style="min-height: 28px"><b>{{ $b->judul }}</b></h3>
                                @if ($b->kategori->nama == 'Umum')
                                    <span class="badge rounded-pill text-bg-danger">{{ $b->kategori->nama }}</span>
                                @elseif($b->kategori->nama == 'Fiksi')
                                    <span class="badge rounded-pill text-bg-success">{{ $b->kategori->nama }}</span>
                                @else($b->kategori->nama == 'Sejarah')
                                    <span class="badge rounded-pill text-bg-secondary">{{ $b->kategori->nama }}</span>
                                @endif
                                <div class="row" style="padding-top:20px;">
                                    <div class="col-6" >
                                        <p class="text-start">
                                            <b>Pengarang</b><br>
                                            {{ $b->pengarang }}
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-end">
                                            <b>Penerbit</b><br>
                                            {{ $b->penerbit->nama }}
                                        </p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

@endsection
