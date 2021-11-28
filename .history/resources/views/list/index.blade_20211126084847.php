@extends('layouts.capp')
@section('content')
<div class="container my-3">
<div class="row">
    @foreach ($lists as $list)
    <div class="col-md-4">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <img src="/img/{{ $list->detail_book->image }}" alt="" style="width: 100%;">
                <p class="card-text"><a href="/lists/{{ $list->detail_book->slug }}">{{ $list->detail_book->title }}</p></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection