@extends('layouts.capp')
@section('content')
    <div class="container mt-3 mb-2">
        @if (session()->has('successRegister'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('successRegister') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        
    </div>
    <div class="container p-3 my-3 d-flex flex-wrap">
        
        <div class="profile-img m-4" style="
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
                @if (is_null($user->nisn))
                    <p class="fs-5 p-3 m-0 text-danger" style="width: max-content;
                    background-color: rgba(252,255,99,0.5);"><a href="/profile/{{ $user->username }}/edit" class="text-decoration-none text-dark rounded">Upgrade to member</a></p>
                @else 
                <p class="fs-5 p-3 m-0 text-danger" style="width: max-content;
                    background-color: rgba(252,255,99,0.5);"><a href="/profile/{{ $user->username }}/edit" class="text-decoration-none text-dark rounded">Edit your profile</a></p>
                @endif
            </h1>
            <p class="fs-3 p-0 m-0" style="margin-top: -10px !important;">{{ '@'.$user->username }}</p>
            <p class="fs-5 p-0 m-0">{{$user->detail_class_department->class_user->class.' '.auth()->user()->detail_class_department->department->abbreviate(auth()->user()->detail_class_department->department->name) }}</p>
        </div>
    </div>
    
@endsection