@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
<form class="w-full my-3 p-3 max-w-full bg-white" action="" method="POST">
    
    @csrf
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/3 mb-3 md:mb-0 px-3">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="name">
                Name
            </label>
            <input name="name" class="bg-gray-50   text-gray-900 text-sm rounded-lg focus:ring-blue-500  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border  border-2 border-red-500 focus:border-blue-500 @else border border-gray-300 focus:border-blue-500 @enderror" id="name" type="text" value="{{ old('name', auth('admin')->user()->name)}}" >
            @error('name')
            <p class="text-red-500 text-xs font-medium">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="username">
                Username
            </label>
            <input name="username" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('username') border-red-500 border-2 @else border-gray-300 @enderror" id="username" type="text" value="{{ old('username', auth('admin')->user()->username)}}">
            @error('username')
            <p class="text-red-500 text-xs font-medium">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="phone">
                Phone
            </label>
            <input name="phone" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('phone') border-red-500 border-2 @else border-gray-300 @enderror" id="phone" type="text" value="{{ old('phone', auth('admin')->user()->phone)}}">
            @error('phone')
                <p class="text-red-500 text-xs font-medium">{{$message}}</p>
            @else
                <p class="text-gray-500 text-xs font-medium">
                    Note : 08**-****-****/*
                </p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="email">
                Email
            </label>
            <input name="email" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-500 border-2 @else border-gray-300 @enderror" id="email" type="email" value="{{ old('email', auth('admin')->user()->email) }}">
            @error('email')
                <p class="text-red-500 text-xs font-medium">{{$message}}</p>
            @enderror
        </div>
        <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="password">
            Password
            </label>
            <input name="password" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-red-500 border-2 @else border-gray-300 @enderror" id="password" type="password" placeholder="******************">
            @error('password')
                <p class="text-red-500 text-xs font-medium">{{$message}}</p>
            @else
            <ul class="list-disc list-inside text-gray-500 text-xs font-medium">
                <li>Password minimal 8 karakter</li>
                <li>Memiliki campuran huruf besar dan huruf kecil</li>
                <li>Memiliki karakter sebuah symbols</li>
                <li>Memiliki campuran angka</li>
              </ul>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="position">
            Position
            </label>
                <select name="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 " id="position">
                    @foreach ($positions as $position)
                        @if($position->id == auth('admin')->user()->position_id)
                            <option value="{{ $position->id }}" selected>{{ $position->name }}</option>
                        @else
                            <option value="{{ $position->id }}">{{ $position->name }}</option>
                        @endif
                    @endforeach
                </select>
                
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="gender">
            Gender
            </label>
                <select name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="gender">
                    @foreach ($genders as $gender)
                        @if($gender == auth('admin')->user()->gender)
                            <option value="{{ $gender }}" selected>{{ $gender }}</option>
                        @else
                            <option value="{{ $gender }}">{{ $gender }}</option>
                        @endif
                    @endforeach
                </select>
                
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="address">
            Address
            </label>
            <input name="address" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('address') border-red-500 border-2 @else border-gray-300 @enderror" id="address" type="text" value="{{ old('address', auth('admin')->user()->address) }}">
            @error('address')
                <p class="text-red-500 text-xs font-medium">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap block my-3">
        <button class="p-2 bg-green-500 hover:shadow-lg hover:bg-green-600 rounded text-white font-medium w-60 md:w-full" type="submit">Klik</button>
    </div>
</form>
@endsection