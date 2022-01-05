{{-- @dd($user) --}}
@extends('layouts.capp')

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
                <p class="p-0 m-0 font-medium text-sm xl:text-base hover:text-blue-400 transition ">{{ $user->username }}</p>
                <p class="p-0 m-0 font-medium text-sm xl:text-base">{{ $user->detail_class_department->class_user->class.' '.$user->detail_class_department->department->department }}</p>
            </div>
        </div>
    </div>    
</div>
@endsection