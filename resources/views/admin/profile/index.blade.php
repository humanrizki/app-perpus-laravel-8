@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
<div class="bg-white block py-10 px-3">
    <div class="max-w-full mx-auto">
        <!--
            ! ------------------------------------------------------------
            ! Profile banner and avatar
            ! ------------------------------------------------------------
            !-->
        <div class="w-full">
            <div class="w-full relative flex justify-center bg-blue-600 h-48 rounded-t-lg"></div>
                <div class="absolute -mt-20 ml-5">
                    <div class=" h-40 w-40 rounded-full shadow-md">
                        <img src="/img/user.png" alt="">
                    </div>
                    
                </div>
                <ul class="absolute -mt-7  navbar-nav xl:right-10 lg:right-10 md:right-10 sm:right-5 right-4">
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw text-white text-3xl"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">{{ '+'.$loans->count() }}</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Loans list
                            </h6>
                            @foreach ($loans as $loan)
                                
                            <a class="dropdown-item d-flex align-items-center" href="/dashboard/loans/{{ $loan->slug }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">{{\Carbon\Carbon::parse($loan->created_at)->format('d F Y') }}</div>
                                    <span class="font-weight-bold d-block">{{ $loan->user->name }}</span>
                                    <span class="small">{{ $loan->book->title }}</span>
                                </div>
                            </a>
                            @endforeach
                            
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!--
            ! ------------------------------------------------------------
            ! Profile general information
            ! ------------------------------------------------------------
            !-->
        <div class="bg-primary border border-primary rounded-b-lg px-5 pb-10 pt-20 flex flex-col flex-wrap">
            <div class="mb-1 mt-3 h-5 w-40">
                <p class="text-base text-white font-medium">{{ auth('admin')->user()->name }}</p>
            </div>
            <div class="mb-1 h-5 w-full">
                <p class="text-base text-white font-medium">{{ auth('admin')->user()->username }}</p>
            </div>
            <div class="text-sm mt-2 text-gray-200">
                <div class="flex flex-row whitespace-wrap flex-wrap ml-auto space-x-2 items-center">
                    <div class="mb-1 h-5 w-max">
                        <p class="text-base text-white font-medium">{{ auth('admin')->user()->email }}</p>
                    </div>
                    <div class="bg-blue-200 rounded-full h-1 w-1"></div>
                    <div class="mb-1 h-5 w-max">
                        <a href="/dashboard/admin/profile/edit" class="underline text-white"><p class="text-base text-white font-medium">{{ __('Edit') }}</p></a>
                    </div>
                </div>
            </div>

            <div class="pt-8 flex flex-wrap gap-8">
                <div class="flex flex-col">
                    <div class="mb-1 h-5 w-20 text-white font-medium">Phone</div>
                    <div class="mb-1 h-5 w-20 text-white font-medium">Gender</div>
                    <div class="mb-1 h-5 w-20 text-white font-medium">Address</div>
                    @if (auth('admin')->user()->detail_class_department_id)
                    <div class="mb-1 h-5 w-20 text-white font-medium">Class</div>
                    @endif
                </div>
                <div class="flex flex-col flex-wrap">
                    <div class="mb-1 h-5 w-max text-white font-medium">{{ auth('admin')->user()->phone }}</div>
                    <div class="mb-1 h-5 w-max text-white font-medium">{{ auth('admin')->user()->gender }}</div>
                    <div class="mb-1 h-5 w-max text-white font-medium">{{ auth('admin')->user()->address }}</div>
                    @if (auth('admin')->user()->detail_class_department_id)
                    <div class="mb-1 h-5 w-max text-white font-medium">{{ auth('admin')->user()->detail_class_department->class_user->class.auth('admin')->user()->detail_class_department->department->department }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection