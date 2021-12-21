@extends('admin.layouts.app')
@section('content')
<div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Welcome back, {{auth()->user()->name}}</h6>
    </div>
    <div class="card-body d-flex justify-content-center">
        <img src="/img/welcomeadmin.png" alt="" class="w-50">
    </div>
</div>
@endsection