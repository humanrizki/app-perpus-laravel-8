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
                left:0px;
                right:0px;" class="btn btn-primary rounded-circle"><i class="fas fa-plus-circle"></i></button>
        </div>
    </div>
@endsection