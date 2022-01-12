@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
<div class="container bg-white p-3">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card hover:shadow-lg mt-2">
                        <div class="card-body">
                            <h5 class="m-0 p-0 text-gray-900 font-medium">Nama : {{ $user->name }}</h5>
                            <h5 class="m-0 p-0 text-gray-900 font-medium">Email : {{ $user->email }}</h5>
                            <h5 class="m-0 p-0 text-gray-900 font-medium">Phone : {{ $user->phone }}</h5>
                            <h5 class="m-0 p-0 text-gray-900 font-medium">Gender : {{ $user->gender }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-3">
            <livewire:homeroom-return-report-table :userId="$user->id"/>
        </div>
    </div>
</div>
@endsection