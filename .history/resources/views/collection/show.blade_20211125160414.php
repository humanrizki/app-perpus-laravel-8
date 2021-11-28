@extends('layouts.capp')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($item->detail_book as $detail)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <img src="/img/{{ $detail->image }}" alt="" width="100">
                        <p class="card-text">{{ $detail->image }}</p>
                        <p class="card-text">{{ $detail->title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection