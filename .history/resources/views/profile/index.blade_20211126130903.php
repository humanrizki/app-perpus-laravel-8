@extends('layouts.capp')
@section('content')
    <div class="container">
        <div class="profile-img" style="
            display:block;
            position: relative;
            width:200px;
            height:200px;
            background-image:url('/img/user.png');
            background-size:100% 100%;">
            <button type="" name="button-img" style="
                display:block;
                position: absolute;
                bottom:0px;
                right:50%;
                left:50%;" class="btn"><i class="fas fa-plus-circle fs-3 bg-primary"></i></button>
        </div>
    </div>
@endsection