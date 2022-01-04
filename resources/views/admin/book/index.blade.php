@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
    
@endsection
@section('content')
    <div class="container-fluid bg-white p-3">
        @if (session()->has('successAddBook'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('successAddBook') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if (session()->has('successEditBook'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('successEditBook') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(auth('admin')->user()->hasRole('admin'))
        <a href="/dashboard/books/create" class="btn btn-success my-4">Add new book!</a>
        <livewire:book-table/>
        @else
        <livewire:book-table-public/>
        @endif
    </div>
@endsection