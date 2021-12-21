@extends('layouts.capp')
@section('content')
<div class="container my-3">
    @if (session()->has('destroyRow'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('destroyRow') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif(session()->has('addToLoan'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('addToLoan') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($detail_book->count() != 0)
    <table class="table">
        <thead>
            <tr>
                <td>No</td>
                <td>Image</td>
                <td>Title</td>
                <td>Admin</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            
        @foreach ($detail_book as $bucket)
        <tr>
            <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
            <td style="vertical-align: middle;" class="w-25"><img src="img/{{ $bucket->book->image }}" alt="" class="img-responsive img-thumbnail w-100"></td>
            <td style="vertical-align: middle;">{{ $bucket->book->title }}</td>
            <td style="vertical-align: middle;">{{ $bucket->book->admin->name }}</td>
            <td style="vertical-align: middle;">
                @if ($bucket->is_loan == true)
                <a href="/lists/{{ $bucket->book->slug }}" class="btn btn-primary"><i class="fas fa-bars"></i></a>
                @else
                <a href="/bucket/{{ $bucket->slug }}" class="btn btn-primary mb-1"><i class="fas fa-money-bill"></i></a>
                <form action="/bucket/{{ $bucket->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
        @else
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
        @endif
    </table>
</div>
@endsection