@extends('user.layouts.capp')
@section('content')
<div class="xl:container w-full  mx-auto p-3">
    <div class="grid grid-cols-12">
        @if (session()->has('failedToDeleteAccount'))
            <div class="col-span-12">
                <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                        {{ session('failedToDeleteAccount') }}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-collapse-toggle="alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>
        @endif
        <div class="col-span-12  mx-auto">
                <form action="/profile/{{ $user->username }}/edit" method="POST">
                    @csrf
                    <h1 class="block font-medium">
                        @if (is_null($user->nisn))
                        Upgrade to member!
                        @else 
                        Edit data!
                        @endif 
                    </h1>
                    @if (is_null($user->nisn))
                        <div class="form-floating mb-2">
                            <label for="floatingInput" class="block font-medium">Nisn</label>
                            <input type="text" class="p-2 bg-white rounded @error('nisn') border border-2 border-red-500 @else border border-2  @enderror" id="floatingInput"  name="nisn">
                            @error('nisn')
                            <div class="text-red-500 font-medium">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male">
                            <label class="inline font-medium"  for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" checked>
                            <label class="inline font-medium" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                        <div class="form-floating mb-2">
                            <label for="floatingInput" class="block font-medium">Number phone</label>
                            <input type="tel" class="p-2 bg-white rounded @error('phone') border border-2 border-red-500 @else border border-2  @enderror" id="floatingInput"  name="phone" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4,5}">
                            
                            @error('phone')
                            <div class="text-red-500 font-medium">
                                {{ $message }}
                            </div>
                            @else
                            <div class="form-text">
                                <p class="block font-medium">note. 0878-****-*****</p>
                            </div>
                            @enderror
                        </div>
                    @else
                    <div class="form-floating mb-3">
                        <label for="name" class="block font-medium">Name</label>
                        <input type="text" class="p-2 bg-white rounded w-full @error('name') border border-2 border-red-500 @else border border-2  @enderror" id="name"  name="name" value="{{old('name',auth()->user()->name)}}">
                        @error('name')
                        <div class="text-red-500 font-medium">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <label for="username" class="block font-medium">Username</label>
                        <input type="text" class="p-2 bg-white rounded w-full @error('username') border border-2 border-red-500 @else border border-2  @enderror" id="username"  name="username" value="{{old('username',auth()->user()->username)}}">
                        @error('username')
                        <div class="text-red-500 font-medium">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <label for="email" class="block font-medium">Email</label>
                        <input type="email" class="p-2 bg-white rounded w-full @error('email') border border-2 border-red-500 @else border border-2  @enderror" id="email"  name="email" value="{{old('email',auth()->user()->email)}}">
                        @error('email')
                        <div class="text-red-500 font-medium">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <label for="password" class="block font-medium">Password</label>
                        <input type="password" class="p-2 bg-white rounded w-full @error('password') border border-2 border-red-500 @else border border-2  @enderror" id="password"  name="password" >
                        @error('password')
                        <div class="text-red-500 font-medium">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <label for="nisn" class="block font-medium">Nisn</label>
                        <input type="text" class="p-2 bg-white rounded w-full @error('nisn') border border-2 border-red-500 @else border border-2  @enderror" id="nisn"  name="nisn" value="{{old('nisn',auth()->user()->nisn)}}">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male">
                        <label class="inline font-medium"  for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" checked>
                        <label class="inline font-medium" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <label for="phone" class="block font-medium">Number phone</label>
                        <input type="text" class="p-2 bg-white rounded w-full @error('phone') border border-2 border-red-500 @else border border-2  @enderror" id="phone"  name="phone" value="{{old('name',auth()->user()->phone)}}">
                        @error('phone')
                        <div class="text-red-500 font-medium">
                            {{ $message }}
                        </div>
                        @else
                        <div class="form-text">
                            <p class="block font-medium">note. 0878-****-*****</p>
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <label for="department"  class="block font-medium">Department</label>
                        <select name="department" id="department" class="p-2 bg-white rounded border border-2">
                            @foreach ($departments as $department)
                                @if ($department->id == auth()->user()->detail_class_department->department->id)
                                    <option value="{{ $department->id }}" selected>{{ $department->department }}</option>
                                    @else
                                    <option value="{{ $department->id }}">{{ $department->department }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('department')
                        <div class="text-red-500 font-medium">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <label for="class_user"  class="block font-medium">Class</label>
                        <select name="class_user" id="class_user" class="p-2 bg-white rounded border border-2 w-full">
                            @foreach ($class_users as $class_user)
                                @if ($class_user->id == auth()->user()->detail_class_department->class_user->id)
                                    <option value="{{ $class_user->id }}" selected>{{ $class_user->class }}</option>
                                    @else
                                    <option value="{{ $class_user->id }}">{{ $class_user->class }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('department')
                        <div class="text-red-500 font-medium">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @endif
                    
                    <button class="w-full p-2 font-medium mb-2 text-white rounded bg-green-500 hover:bg-green-600" type="submit">Edit</button>
                </form>
                <hr>
                <form action="/profile/{{ auth()->user()->username }}/destroy" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="mt-2 p-2 text-white font-medium rounded text-center bg-red-300 hover:bg-red-400 w-full">Hapus akun</button>
                </form>
        </div>
    </div>
</div>

@endsection