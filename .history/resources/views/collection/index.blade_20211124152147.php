@extends('layouts.capp')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($items as $item)
        <div class="col-md-6"> 
            <div class="card">
                <div class="card-body">
                    <h3>{{ $item->name_collection }}</h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection