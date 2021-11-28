@extends('layouts.capp')
@section('content')
    <div class="container-img" style="
        width: 100%; 
        height:100vh; 
        background-image:url('img/cn.png');
        background-repeat:no-repeat;
        background-size:100% 100%;
        ">
        <div class="container w-100 h-50">
            <div class="img-gambar w-100 h-100">
                <img src="img/logo.png" class="gambar" alt="" >
            </div>
            
        </div>
        <div class="container w-100 h-75 ">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <p class="card-text fw-bold">
                                Visi
                            </p>
                            <p class="card-text">
                                Terwujudnya Sekolah Kejuruan yang Religius, Disiplin dan Terampil dalam Menyongsong Generasi Emas di tahun 2045
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            Mantap!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection