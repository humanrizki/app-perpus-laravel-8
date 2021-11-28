@extends('layouts.capp')
@section('content')
<div class="container text-center d-flex justify-content-center my-4">
    <div class="row">
        <div class="col-lg-12">
            <main class="form-signin">
                <form action="/profile/{{ $user->username }}/edit" method="POST">
                    @method('put')
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">
                        @if (auth()->user()->is_member == 0)
                        Upgrade to member!
                        @else 
                        Edit data!
                        @endif 
                    </h1>
                    @if (auth()->user()->is_member == 0)
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput"  name="nisn">
                            <label for="floatingInput">Nisn</label>
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
                    @else
                        Mantap
                    @endif
                    
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
                </form>
            </main>

        </div>
    </div>
</div>

@endsection