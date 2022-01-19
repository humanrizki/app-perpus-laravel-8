@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
<div class="bg-white block py-10 px-3">
    @if (session()->has('successUpdate'))
    <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
            {{ session('successUpdate') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-collapse-toggle="alert-1" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
      </div>
    @endif
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
                @if (auth('admin')->user()->hasRole('admin'))
                    
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
                @endif

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
                    <div class="mb-1 h-5 w-max text-white font-medium">{{ auth('admin')->user()->detail_class_department->class_user->class.' '.auth('admin')->user()->detail_class_department->department->department }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection