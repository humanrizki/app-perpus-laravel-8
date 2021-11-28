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
                <ul class="list-group">
                    <li class="list-group-item"><p>Judul</p>{{ $detail->title }}</li>
                    <li class="list-group-item"><p>Penulis</p>{{ $detail->creator }}</li>
                    <li class="list-group-item"><p>Ilustrator</p>{{ $detail->illustrator }}</li>
                    <li class="list-group-item"><p>Penerbit lokal</p>{{ $detail->original_publisher }}</li>
                    <li class="list-group-item">{{ $detail->local_publisher }}</li>
                    <li class="list-group-item">{{ $detail->pages }}</li>
                    <li class="list-group-item">{{ $detail->edition }}</li>
                    <li class="list-group-item">{{ $detail->category->name }}</li>
                    <li class="list-group-item">{{ $detail->bookcase->name }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection