<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <h1 class="text-2xl font-bold text-blue-500 p-3 shadow-lg ">Register Walas</h1>
    <div class="xl:container w-full mx-auto p-3 bg-white">
        <form class="w-full my-3 p-3 max-w-full" action="" method="POST">
            @if (session()->has('registerFailed'))
            <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                  {{ session('registerFailed') }}
                </div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-collapse-toggle="alert-2" aria-label="Close">
                  <span class="sr-only">Close</span>
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            @endif
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/3 mb-3 md:mb-0 px-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="name">
                        Name
                    </label>
                    <input name="name" class="bg-gray-50   text-gray-900 text-sm rounded-lg focus:ring-blue-500  block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('name') border  border-2 border-red-500 focus:border-blue-500 @else border border-gray-300 focus:border-blue-500 @enderror" id="name" type="text" value="{{ old('name')}}" >
                    @error('name')
                    <p class="text-red-500 text-xs font-medium">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="username">
                        Username
                    </label>
                    <input name="username" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('username') border-red-500 border-2 @else border-gray-300 @enderror" id="username" type="text" value="{{ old('username')}}">
                    @error('username')
                    <p class="text-red-500 text-xs font-medium">{{$message}}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3 px-3 mb-3 md:mb-0">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="phone">
                        Phone
                    </label>
                    <input name="phone" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('phone') border-red-500 border-2 @else border-gray-300 @enderror" id="phone" type="text" value="{{ old('phone')}}">
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
                    <input name="email" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') border-red-500 border-2 @else border-gray-300 @enderror" id="email" type="email" value="{{ old('email') }}">
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
                                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                        
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="gender">
                    Gender
                    </label>
                        <select name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="gender">
                            @foreach ($genders as $gender)
                                    <option value="{{ $gender }}">{{ $gender }}</option>
                            @endforeach
                        </select>
                        
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="address">
                    Address
                    </label>
                    <input name="address" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('address') border-red-500 border-2 @else border-gray-300 @enderror" id="address" type="text" value="{{ old('address') }}">
                    @error('address')
                        <p class="text-red-500 text-xs font-medium">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="class">
                        Class
                    </label>
                    <select name="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="class">
                        @foreach ($classes_user as $class_user)
                                <option value="{{ $class_user->id }}">{{ $class_user->class }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full md:w-2/4 px-3 mb-3 md:mb-0">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="department">
                    Department
                    </label>
                    <select name="department" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="department">
                        @foreach ($departments as $depart)
                                <option value="{{ $depart->id }}">{{ $depart->department }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap block my-3">
                <button class="p-2 bg-green-500 hover:shadow-lg hover:bg-green-600 rounded text-white font-medium w-60 md:w-full" type="submit">Klik</button>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
</body>
</html>