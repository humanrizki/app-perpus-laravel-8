@extends('layouts.capp')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($items as $item)
        <div class="col-md-6"> 
            <div class="card">
                <div class="card-body">
                    <h3 class="card-text"><a href="/collections/{{ $item->name_collection }}">{{ $item->name_collection }}</a></h3>   
                </div>
                
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection