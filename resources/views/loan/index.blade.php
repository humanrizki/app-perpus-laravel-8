@extends('layouts.capp')
@section('content')
    <div class="container my-3">
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
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Image</td>
                    <td>Judul</td>
                    <td>Durasi Pinjam</td>
                    <td>Denda</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    
                    <tr>
                        <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
                        <td style="vertical-align: middle;" class="w-25"><img src="/storage/{{ $loan->bucket->book->image }}" alt="" class="img-thumbnail w-100"></td>
                        <td style="vertical-align: middle;">{{ $loan->bucket->book->title }}</td>
                        <td style="vertical-align: middle;">{{ \Carbon\Carbon::parse($loan->return_date)->locale('id_ID')->diffForHumans(\Carbon\Carbon::now('Asia/Jakarta'),[
                            'parts'=>3,
                            'join'=>', ',
                            'syntax'=>\Carbon\CarbonInterface::DIFF_RELATIVE_TO_NOW
                        ]) }}</td>
                        <td style="vertical-align: middle;">Rp.{{ $loan->toKilo($loan->forfeit) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif

    </div>
@endsection