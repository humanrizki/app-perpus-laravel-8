@extends('layouts.capp')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($item->detail_book as $detail)
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <p class="card-text">{{ $item->detail_book->title }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection