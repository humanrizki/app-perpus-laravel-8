@extends('layouts.capp')
@section('content')
<div class="container text-center d-flex justify-content-center my-4">
    <div class="row">
        <div class="col-lg-12">
            <main class="form-signin">
                <form action="/profile/{{ $user->username }}/edit" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">
                        @if ($user->is_member == 0)
                        Upgrade to member!
                        @else 
                        Edit data!
                        @endif 
                    </h1>
                    @if ($user->is_member == 0)
                        <div class="form-floating">
                            <input type="text" class="form-control  @error('nisn') 'is-invalid' @enderror" id="floatingInput"  name="nisn">
                            <label for="floatingInput">Nisn</label>
                            @error('nisn')
                            <div class="valid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male">
                            <label class="form-check-label"  for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control @error('phone') 'is-invalid' @enderror" id="floatingInput"  name="phone">
                            <label for="floatingInput">Number phone</label>
                            @error('phone')
                            <div class="valid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control @error('department') 'is-invalid' @enderror" id="floatingInput"  name="department" >
                            <label for="floatingInput">Department</label>
                            @error('department')
                            <div class="valid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    @else
                    <div class="form-floating">
                        <input type="text" class="form-control  @error('name') 'is-invalid' @enderror" id="floatingInput"  name="name">
                        <label for="floatingInput">Name</label>
                        @error('name')
                        <div class="valid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control  @error('username') 'is-invalid' @enderror" id="floatingInput"  name="username">
                        <label for="floatingInput">Username</label>
                        @error('username')
                        <div class="valid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control  @error('email') 'is-invalid' @enderror" id="floatingInput"  name="email">
                        <label for="floatingInput">Email</label>
                        @error('email')
                        <div class="valid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control  @error('password') 'is-invalid' @enderror" id="floatingInput"  name="password">
                        <label for="floatingInput">Password</label>
                        @error('password')
                        <div class="valid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating ">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control  @error('nisn') 'is-invalid' @enderror" id="floatingInput"  name="nisn">
                        <label for="floatingInput">Nisn</label>
                        @error('nisn')
                        <div class="valid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male">
                        <label class="form-check-label"  for="flexRadioDefault1">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('phone') 'is-invalid' @enderror" id="floatingInput"  name="phone">
                        <label for="floatingInput">Number phone</label>
                        @error('phone')
                        <div class="valid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('department') 'is-invalid' @enderror" id="floatingInput"  name="department" >
                        <label for="floatingInput">Department</label>
                        @error('department')
                        <div class="valid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    @endif
                    
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Edit</button>
                </form>
            </main>

        </div>
    </div>
</div>

@endsection