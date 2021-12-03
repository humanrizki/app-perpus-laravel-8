@extends('layouts.capp')
@section('content')
{{-- @dd($lists) --}}
<div class="container my-3">
<div class="row">
    @foreach ($lists as $list)
    <div class="col-md-4 mt-3">
        <div class="card shadow" style="width: 100%;">
            <div class="card-body">
                {{-- @foreach ($list->detail_book as $item) --}}
                    
                {{-- <img src="img/{{ $list->detail_book->image }}" alt="" style="width: 100%;"> --}}
                {{-- <p class="card-text"><a href="/lists/{{ $list->detail_book->slug }}">{{ $list->detail_book->title }}</p></a> --}}
                @foreach ($list->detail_book() as $item)
                    
                @endforeach
                {{-- @endforeach --}}
            </div>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection