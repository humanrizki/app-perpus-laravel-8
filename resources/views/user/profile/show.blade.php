@extends('user.layouts.capp')
@section('content')
<div class="xl:container w-full  mx-auto p-3">
    <div class="grid grid-cols-12">
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
                    
                    <button class="w-full p-2 font-medium text-white rounded bg-green-500 hover:bg-green-600" type="submit">Edit</button>
                </form>
        </div>
    </div>
</div>

@endsection