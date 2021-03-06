@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <div class="row">
            @foreach ($item->detail_book as $detail)
            <div class="col-md-4 mt-3">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <img src="/img/{{ $detail->image }}" alt="" style="width: 100%;">
                        <p class="card-text"><a href="/lists/{{ $detail->slug }}">{{ $detail->title }}</p></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection