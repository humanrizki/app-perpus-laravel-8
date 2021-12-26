@extends('admin.layouts.app')
@section('head')
    
@endsection
@section('content')
    <div class="container-fluid bg-white">
        <div class="container p-3">

            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <img src="/storage/{{ $book->image }}" alt="" class="img-thumbnail">
                </div>
                <div class="col-lg-7 col-md-12">
                    <h2 class="border p-2 rounded my-1">{{ $book->title }}</h2>
                    <p class="border p-2 rounded my-2">Creator : {{ $book->creator }}</p>
                    <p class="border p-2 rounded my-2">Illustrator : {{ $book->illustrator }}</p>
                    <p class="border p-2 rounded my-2">Pages : {{ $book->pages }}</p>
                    <p class="border p-2 rounded my-2">Stock : {{ $book->stock }}</p>
                    <p class="border p-2 rounded my-2">Edition : {{ \Carbon\Carbon::parse($book->edition)->format('d F Y') }}</p>
                    <p class="border p-2 rounded my-2">Category : {{ $book->category->name }}</p>
                    <p class="border p-2 rounded my-2">Local publisher : {{ $book->local_publisher }}</p>
                    <p class="border p-2 rounded my-2">Original publisher : {{ $book->original_publisher }}</p>
                    <p class="border p-2 rounded my-2">Collection : {{ $book->collection_book->name }}</p>
                    <p class="border p-2 rounded my-2">Bookcase : {{ $book->bookcase->name }}</p>
                    @if (auth('admin')->user()->hasAnyRole('headteacher','homeroom'))
                        
                    <p class="border p-2 rounded my-2">Admin : {{ $book->admin->name }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection