@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow" style="width: 100%;">
                    <div class="card-body">
                        <img src="/img/{{ $detail->image }}" alt="" style="width: 100%;">
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
                        </table>
                        @if (auth()->user()->is_member == 1)
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="detail_id" value="{{ $detail->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="admin_id" value="{{ $detail->admin->id }}">
                            <button class="btn btn-info text-white">Pinjam</button>
                        </form>
                        @else
                        <p class="text-danger">Jadi member dulu gan!</p>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection