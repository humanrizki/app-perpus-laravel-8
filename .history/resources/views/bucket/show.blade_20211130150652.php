@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <h3 class="my-3">Checkout your book!</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow" style="width: 100%;">
                    <div class="card-body">
                        <h5>Personal details!</h5>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control bg-white" value="{{ auth()->user()->name }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="">Username</label>
                                <input type="text" class="form-control bg-white" value="{{ auth()->user()->username }}" disabled>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label for="">Phone</label>
                                <input type="text" class="form-control bg-white" value="{{ substr(auth()->user()->phone,0,4) }}*******" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="">Department</label>
                                <input type="text" class="form-control bg-white" value="{{ auth()->user()->department }}" disabled>
                            </div>
                        </div>
                        <h5>Detail Book!</h5>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label for="">Title</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->detail->title }}" disabled>
                            </div>
                            <div class="col-md-12">
                                <label for="">Department</label>
                                <input type="text" class="form-control bg-white" value="{{ auth()->user()->department }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow" style="width: 100%;">
                    <div class="card-body">
                        <h4>Durasi peminjaman!</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Dari</label>
                                <input type="datetime-local" name="" id="" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="">Sampai</label>
                                <input type="datetime-local" name="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection