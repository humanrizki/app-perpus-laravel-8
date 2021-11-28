@extends('layouts.capp')
@section('content')
    <div class="container p-3 my-3">
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
                bottom:-30px;
                outline:none;
                border:none;
                "><i class="fas fa-plus-circle fs-3 bg-primary text-white p-3 rounded-circle"></i></button>
        </div>
    </div>
@endsection