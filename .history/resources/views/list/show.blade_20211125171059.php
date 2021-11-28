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
                    <li class="list-group-item">{{ $detail->title }}</li>
                    <li class="list-group-item">{{ $detail->creator }}</li>
                    <li class="list-group-item">{{ $detail->illustrator }}</li>
                    <li class="list-group-item">{{ $detail->original_publisher }}</li>
                    <li class="list-group-item">{{ $detail->local_publisher }}</li>
                    <li class="list-group-item">{{ $detail->pages }}</li>
                    <li class="list-group-item">{{ $detail->edition->format('Y m d') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection