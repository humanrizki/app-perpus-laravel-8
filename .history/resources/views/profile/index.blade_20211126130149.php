@extends('layouts.capp')
@section('content')
    <div class="container">
        <div class="profile-img" style="
            display:block;
            width:200px;
            height:200px;
            background-image:url('/img/user.png');
            background-size:100% 100%;">
            <input type="file" name="img" style="
                position: absolute;">
        </div>
    </div>
@endsection