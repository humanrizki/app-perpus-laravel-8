@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <div class="row">
            @if (session()->has('addToBucket'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('addToBucket') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-4">
                <div class="card shadow" style="width: 100%;">
                    <div class="card-body">
                        <img src="/storage/{{ $detail->image }}" alt="" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow" style="width: 100%;">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td>Judul</td>
                                <td>{{ $detail->title }}</td>
                            </tr>
                            <tr>
                                <td>Penulis</td>
                                <td>{{ $detail->creator }}</td>
                            </tr>
                            <tr>
                                <td>Ilustrator</td>
                                <td>{{ $detail->illustrator }}</td>
                            </tr>
                            <tr>
                                <td>Penerbit lokal</td>
                                <td>{{ $detail->local_publisher }}</td>
                            </tr>
                            <tr>
                                <td>Penerbit original</td>
                                <td>{{ $detail->original_publisher }}</td>
                            </tr>
                            <tr>
                                <td>Halaman</td>
                                <td>{{ $detail->pages }}</td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>{{ ($detail->stock == 0) ? 'kosong' : $detail->stock }}</td>
                            </tr>
                            <tr>
                                <td>Edisi</td>
                                <td>{{ \Carbon\Carbon::parse($detail->edition)->format('d F Y') }}</td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>{{ $detail->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Nomor rak</td>
                                <td>{{ $detail->bookcase->name }}</td>
                            </tr>
                            <tr>
                                <td>Lokasi rak</td>
                                <td>{{ $detail->bookcase->location_bookcase }}</td>
                            </tr>
                            <tr>
                                <td>Admin</td>
                                <td>{{ $detail->admin->name }}</td>
                            </tr>
                        </table>
                        @if (!is_null(auth()->user()->nisn))
                            @if(!is_null($loan))
                                <p>Buku sudah dipinjam!</p>
                            @elseif(!is_null($bucket))
                                <p>Buku sudah ada di sessi</p>
                            @elseif($detail->stock == 0)
                                <p class="text-primary">Stok tidak tersedia, sedang banyak yang meminjam!</p>
                            @else
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $detail->id }}">
                                        <button class="btn btn-info text-white" type="submit">Pinjam</button>
                                    </form>
                            @endif
                        @else
                        <p class="text-danger">Jadi member dulu, baru bisa minjem buku gan!</p>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection