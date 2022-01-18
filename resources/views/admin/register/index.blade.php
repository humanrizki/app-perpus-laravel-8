@extends('admin.layouts.app')
@section('content')
    <h1 class="text-2xl font-bold text-blue-500 p-3 shadow-lg ">Register Walas</h1>
    <div class="xl:container w-full p-3 bg-white">
        <form class="w-full my-3 p-5 max-w-full bg-white" action="" method="POST">
            <h5 class="mb-3 text-2xl font-medium text-gray-400 ">Update you'r data!</h5>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 mb-3 md:mb-0 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        Name
                    </label>
                    <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="name" type="text" value="{{ old('name')}}" >
                    @error('name')
                    <p class="text-red-500 text-xs italic font-medium">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="username">
                        Username
                    </label>
                    <input name="username" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="username" type="text" value="{{ old('username')}}">
                    @error('username')
                    <p class="text-red-500 text-xs italic font-medium">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
                        Phone
                    </label>
                    <input name="phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phone" type="text" value="{{ old('phone')}}">
                    @error('phone')
                    <p class="text-red-500 text-xs italic font-medium">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        Email
                    </label>
                    <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic font-medium">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                    Password
                    </label>
                    <input name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="password" placeholder="******************">
                    @error('password')
                        <p class="text-red-500 text-xs italic font-medium">{{$message}}</p>
                    @else
                    <ul class="list-disc list-inside text-xs italic">
                        <li>Password minimal 8 karakter</li>
                        <li>Memiliki campuran huruf besar dan huruf kecil</li>
                        <li>Memiliki karakter sebuah symbols</li>
                      </ul>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="position">
                    Position
                    </label>
                    <div class="relative">
                        <select name="position" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="position">
                            @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="gender">
                    Gender
                    </label>
                    <div class="relative">
                        <select name="gender" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="gender">
                            @foreach ($genders as $gender)
                                    <option value="{{ $gender }}">{{ $gender }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                    Address
                    </label>
                    <input name="address" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="address" type="text" value="{{ old('address') }}">
                    @error('address')
                        <p class="text-red-500 text-xs italic font-medium">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        Email
                    </label>
                    <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic font-medium">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                    Password
                    </label>
                    <input name="password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="password" placeholder="******************">
                    @error('password')
                        <p class="text-red-500 text-xs italic font-medium">{{$message}}</p>
                    @else
                    <ul class="list-disc list-inside text-xs italic">
                        <li>Password minimal 8 karakter</li>
                        <li>Memiliki campuran huruf besar dan huruf kecil</li>
                        <li>Memiliki karakter sebuah symbols</li>
                      </ul>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap block">
                <button class="p-2 bg-green-400 hover:bg-green-900 shadow-lg rounded text-white font-medium w-60 md:w-full" type="submit">Klik</button>
            </div>
        </form>
    </div>
@endsection