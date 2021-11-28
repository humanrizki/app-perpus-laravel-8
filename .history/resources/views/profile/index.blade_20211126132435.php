@extends('layouts.capp')
@section('content')
    <div class="container p-3 my-3 border d-flex flex-wrap">
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
            <h1>{{ $user->name }} <span class="badge bg-secondary">Upgrade to Member</span></h1>
            <p class="fs-3 p-0" style="margin-top: -10px">{{ $user->username }}</p>
        </div>
    </div>
@endsection