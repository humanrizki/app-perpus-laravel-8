@extends('user.layouts.capp')
@section('content')
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