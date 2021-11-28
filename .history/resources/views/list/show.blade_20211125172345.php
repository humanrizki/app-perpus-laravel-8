@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <img src="/img/{{ $detail->image }}" alt="" style="width: 100%;">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-striped"></table>
            </div>
        </div>
    </div>
@endsection