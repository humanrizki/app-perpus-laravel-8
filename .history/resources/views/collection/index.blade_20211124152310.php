@extends('layouts.capp')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($items as $item)
        <div class="col-md-6"> 
            <div class="card">
                <div class="card-body">
                    <h3 class="card-text">{{ $item->name_collection }}</h3>
                    
                </div>
                <div class="card-footer">
                    <p class="card-text">{{ $item->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection