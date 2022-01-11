@extends('layouts.capp')
@section('content')
    @if ($teacher)
        <div class="flex flex-wrap w-11/12 mx-auto my-3 items-center ">
            <div class="w-max xl:w-1/5 md:w-1/5 mt-2 mx-auto ">
                <div class="p-6 rounded-full border-2 hover:border-blue-300">
                    <img src="/img/user.png" alt="" class="w-52 xl:w-52 hover:shadow-xl rounded-full">
                </div>
            </div>
            <div class="w-full xl:w-4/5 md:w-4/5 ">
                <div class="p-6 rounded-full w-4/5 mx-auto border-2 hover:border-blue-300 mt-2">
                    <div class="mx-7">
                        <h1 class="xl:text-2xl font-medium text-gray-700">{{ $teacher->name }}</h1>
                        <p class="p-0 m-0 font-medium text-sm xl:text-base hover:text-blue-400 transition ">{{ $teacher->username }}</p>
                        <p class="p-0 m-0 font-medium text-sm xl:text-base">{{ $teacher->detail_class_department->class_user->class.' '.$teacher->detail_class_department->department->department }}</p>
                        <a href="/teacher/agreement/{{ auth()->user()->username }}" class="inline-block whitespace-wrap w-max max-w-full text-gray-900 text-sm  font-medium "><p class="m-0 my-1 p-1 border rounded border-blue-500 hover:bg-blue-500 hover:text-white hover:underline">Lihat permintaan kas yang disetujui!</p></a>
                    </div>
                </div>
            </div>    
        </div>
    @else
    @endif
@endsection