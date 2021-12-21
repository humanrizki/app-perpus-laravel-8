@extends('layouts.capp')
@section('content')
{{-- @dd($lists) --}}
<div class="container my-3">
<div class="row">
    @foreach ($books as $key => $book)
    <div class="col-md-4 mt-3">
        <div class="card shadow" style="width: 100%;">
            <div class="card-body">
                <img src="img/{{ $book->image }}" alt="" style="width: 100%;">
                <a href="/lists/{{ $book->slug }}"><p>{{ $book->title }}</p></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection