@extends('layouts.capp')
@section('content')
<div class="container text-center d-flex justify-content-center my-4">
    <div class="row">
        <div class="col-lg-12">
            <main class="form-signin">
                <form action="/profile/{{ $user->username }}/edit" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">
                        @if (is_null($user->nisn))
                        Upgrade to member!
                        @else 
                        Edit data!
                        @endif 
                    </h1>
                    @if (is_null($user->nisn))
                        <div class="form-floating">
                            <input type="text" class="form-control  @error('nisn') is-invalid @enderror" id="floatingInput"  name="nisn">
                            <label for="floatingInput">Nisn</label>
                            @error('nisn')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="male">
                            <label class="form-check-label"  for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="female" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Female
                            </label>
                        </div>
                        <div class="form-floating">
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="floatingInput"  name="phone" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4,5}">
                            <label for="floatingInput">Number phone</label>
                            
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @else
                            <div class="form-text">
                                <p>note. 0878-****-*****</p>
                            </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            
                            @error('department')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    @else
                    <div class="form-floating">
                        <input type="text" class="form-control  @error('name') 'is-invalid' @enderror" id="floatingInput"  name="name">
                        <label for="floatingInput">Name</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control  @error('username') 'is-invalid' @enderror" id="floatingInput"  name="username">
                        <label for="floatingInput">Username</label>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control  @error('email') 'is-invalid' @enderror" id="floatingInput"  name="email">
                        <label for="floatingInput">Email</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control  @error('password') 'is-invalid' @enderror" id="floatingInput"  name="password">
                        <label for="floatingInput">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" class="form-control  @error('nisn') 'is-invalid' @enderror" id="floatingInput"  name="nisn">
                        <label for="floatingInput">Nisn</label>
                        @error('nisn')
                        <div class="invalid-feedback">
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
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        @error('department')
                        <div class="invalid-feedback">
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