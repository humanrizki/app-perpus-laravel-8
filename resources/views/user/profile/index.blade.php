@extends('user.layouts.capp')
@section('content')
<div class="xl:container w-11/12 mx-auto mt-2">
    @if (session()->has('successRegister'))
    <div id="alert-2" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
            {{ session('successRegister') }}
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-collapse-toggle="alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    @endif
</div>
<div class="flex flex-wrap w-11/12 mx-auto my-3 items-center ">
    <div class="w-max xl:w-1/5 md:w-1/5 mt-2 mx-auto ">
        <div class="p-6 rounded-full border-2 hover:border-blue-300">
            <img src="/img/user.png" alt="" class="w-52 xl:w-52 hover:shadow-xl rounded-full">
        </div>
    </div>
    <div class="w-full xl:w-4/5 md:w-4/5 ">
        <div class="p-6 rounded-full w-4/5 mx-auto border-2 hover:border-blue-300 mt-2">
            <div class="ml-7">
                <h1 class="xl:text-2xl font-medium text-gray-700">{{ $user->name }}</h1>
                <a href="/profile/{{auth()->user()->username}}/edit"><p class="p-0 m-0 font-medium text-sm xl:text-base hover:text-blue-400 transition inline">{{ $user->username }} <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline bi bi-chevron-compact-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"/>
                </svg></p> 
                    </a>
                <p class="p-0 m-0 font-medium text-sm xl:text-base">{{ $user->detail_class_department->class_user->class.' '.$user->detail_class_department->department->department }}</p>
            </div>
        </div>
    </div>    
</div>
@endsection