@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid bg-white p-3">
        @if (session()->has('successAddBook'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('successAddBook') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <a href="/dashboard/books/create" class="btn btn-success">Add new book!</a>
        <livewire:book-table 
        model="App\Models\Book" exclude="category_id, collection_book_id, bookcase_id"/>
    </div>
@endsection