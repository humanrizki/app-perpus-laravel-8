@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
    <div class="container-fluid p-3 bg-white">
        <livewire:transactions-table/>
    </div>
@endsection