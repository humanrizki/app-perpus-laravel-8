@extends('layouts.capp')
@section('content')
<div class="container">
    <div class="row my-3">
        @foreach ($items as $item)
        <div class="col-md-6 my-3"> 
            <div class="card">
                <div class="card-body">
                    <h3 class="card-text"><a href="/collections/{{ $item->slug }}">{{ $item->name}}</a></h3>   
                    <p class="card-text fs-5">total Buku : {{ $item->books->count() }}</p>
                    <p class="card-text fs-5 p-0">Stok berada dimasing-masing buku</p>
                </div>
                
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection