@extends('layouts.capp')
@section('content')
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $item->detail_book->title }}</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection