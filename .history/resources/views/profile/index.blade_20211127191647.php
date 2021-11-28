@extends('layouts.capp')
@section('content')
    <div class="container p-3 my-3 d-flex flex-wrap">
        <div class="profile-img m-5" style="
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
        <div class="profile-info ms-5 mt-3" >
            <h1 class="position-relative">{{ $user->name }} 
                @if ($user->is_member == 0)
                <span class="badge bg-secondary p-2 fs-6 position-absolute top-0 start-100 ms-1"><a class="text-white text-decoration-none" href="/profile/{{ $user->username }}/edit">
                    Upgrade to Member
                </a></span>
                @else 
                <span class="badge bg-warning fs-4"><a href="/profile/{{ $user->username }}/edit" class="text-white"><i class="fas fa-edit"></i></a></span>
                @endif
            </h1>
            <p class="fs-3 p-0" style="margin-top: -10px">{{ $user->username }}</p>
        </div>
    </div>
    
@endsection