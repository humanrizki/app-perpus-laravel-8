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
                @else
                <span class="badge bg-warning p-2 fs-6 position-absolute top-0 start-100 ms-1">Member</span>
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
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="" class="form-label"></label>
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