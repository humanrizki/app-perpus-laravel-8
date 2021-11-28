@extends('layouts.capp')
@section('content')
    <div class="container p-3 my-3 d-flex flex-wrap">
        <div class="profile-img" style="
            display:flex;
            position: relative;
            width:200px;
            height:200px;
            justify-content:center;
            background-image:url('/img/user.png');
            background-size:100% 100%;">
            <button type="" name="button-img" style="
                display:block;
                position: absolute;
                bottom:-20px;
                outline:none;
                border:none;
                border-radius:50%;
                "><i class="fas fa-plus-circle fs-1 bg-primary text-white p-2 rounded-circle"></i></button>
        </div>
        <div class="profile-info ms-5" >
            <h1 class="position-relative">{{ $user->name }} 
                @if ($user->is_member == 0)
                <span class="badge bg-secondary p-2 fs-6 position-absolute top-0 start-100 ms-1"><button type="button" style="background: none;
                    border:none;" class="text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Upgrade to Member
                  </button></span>
                @endif
            </h1>
            <p class="fs-3 p-0" style="margin-top: -10px">{{ $user->username }}</p>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upgrade to member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="profile" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nisn" class="form-label">Nisn</label>
                            <input type="number" name="nisn" id="nisn" class="form-control is-invalid">
                        </div>
                        <div class="form-group">
                            <label for="gender" class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="Male" checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="Female" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Num Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" name="department" id="department" class="form-control">
                        </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection