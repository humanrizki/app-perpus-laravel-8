@dd($items)
@extends('layouts.capp')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($items as $item)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $item->title }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection