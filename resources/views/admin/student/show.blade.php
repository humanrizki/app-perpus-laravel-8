@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
    <div class="container bg-white p-3">
        <div class="row">
            <div class="col-md-8 offset-md-2">
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
                    <div class="col-md-6">
                        <a href="/dashboard/students/{{ $user->username }}/loans">
                        <div class="card hover:shadow-lg mt-2 w-full">
                            <div class="card-body w-auto">
                                    <div class="flex flex-col items-center w-full ">
                                        <img src="/img/bookloan.png" alt="" class="w-40">
                                        <p class="m-0 p-0 font-medium text-base">Loan</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/dashboard/students/{{ $user->username }}/returns">
                            <div class="card hover:shadow-lg mt-2 w-full">
                                <div class="card-body w-auto">
                                        <div class="flex flex-col items-center w-full ">
                                            <img src="/img/bookreturn.png" alt="" class="w-40">
                                            <p class="m-0 p-0 font-medium text-base">Return</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection