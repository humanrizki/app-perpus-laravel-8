@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <div class="row">
            @foreach ($item->detail_book as $detail)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body ">
                        <img src="/img/{{ $detail->image }}" alt="" width="300">
                        <p class="card-text">{{ $detail->title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection