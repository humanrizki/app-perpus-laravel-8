@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <img src="/img/{{ $detail->image }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <ul class="list-group">
                    <li class="list-group-item">{{ $detail->title }}</li>
                </ul>
            </div>
        </div>
    </div>
@endsection