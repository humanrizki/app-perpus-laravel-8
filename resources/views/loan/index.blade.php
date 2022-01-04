@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        @if (session()->has('deleteLoan'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('deleteLoan') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
        @if ($loans->count() == 0)
        <div class="alert border">
            <h3>Data masih kosong sahabat!</h3>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <img src="/img/clipboard1.png" alt="" style="width: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card border-0">
                        <div class="card-body">
                            <p class="card-text">
                                Kamu dapat memesan / meminjam buku melalui link lists atau collections. Pastikan setelah pinjam, kamu melakukan transaksi untuk memberi tahu admin agar kamu diberikan kartu peminjaman dari perpus untuk dibawa pulan dalam jangka yang sudah kamu tentukan serta kembalikan buku dalam keadaan seperti awal kamu meminjam dengan membayarkan denda.
                            </p>
                            <div class="d-flex align-items-end justify-content-end" style="height: 100px">
                                <a class="btn btn-primary" href="/lists">Tambah data</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else 
        <div class="tabledata" style="overflow-x: auto;">

        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Image</td>
                    <td>Judul</td>
                    <td>Durasi Pinjam</td>
                    <td>Status</td>
                    <td>Denda</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    
                    <tr>
                        <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                        <td style="vertical-align: middle;" class="w-25"><img src="/storage/{{ $loan->book->image }}" alt="" class="img-responsive img-thumbnail w-100"></td>
                        <td style="vertical-align: middle;">{{ $loan->book->title }}</td>
                        <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($loan->return_date)->locale('id_ID')->diffForHumans(\Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'),[
                            'parts'=>4,
                            'join'=>true,
                            'short'=>true,
                            'syntax'=>\Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW,
                            'options'=>\Carbon\Carbon::JUST_NOW | \Carbon\Carbon::ONE_DAY_WORDS | \Carbon\Carbon::TWO_DAY_WORDS
                        ]) }}</td>
                        <td style="vertical-align: middle;">{{ $loan->status }}</td>
                        <td style="vertical-align: middle;">Rp.{{ $loan->toKilo($loan->forfeit) }}</td>
                        <td style="vertical-align: middle;">
                                <a href="/loan/{{ $loan->slug }}" class="btn btn-primary"><i class='bi bi-eye-fill text-white'></i></a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>

        @endif

    </div>
@endsection