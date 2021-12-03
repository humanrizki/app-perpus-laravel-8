@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow" style="width: 100%;">
                    <div class="card-body">
                        <h3>Checkout your book!</h3>
                        <h5>Personal details!</h5>
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
                    </div>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
    
@endsection