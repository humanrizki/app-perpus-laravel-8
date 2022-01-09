@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
    <div class="container bg-white p-3">
        <livewire:return-report-table/>
    </div>
@endsection