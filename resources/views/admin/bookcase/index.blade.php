@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
    <div class="container-fluid bg-white p-3">
        <livewire:bookcase-table/>
    </div>
@endsection