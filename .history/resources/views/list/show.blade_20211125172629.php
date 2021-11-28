@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <img src="/img/{{ $detail->image }}" alt="" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
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
                    
                </table>
            </div>
        </div>
    </div>
@endsection