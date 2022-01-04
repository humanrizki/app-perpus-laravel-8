@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
    <div class="container-fluid bg-white p-3">
        @if (session()->has('successAddToTransaction'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('successAddToTransaction') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <livewire:loan-report-table/>
    </div>
@endsection