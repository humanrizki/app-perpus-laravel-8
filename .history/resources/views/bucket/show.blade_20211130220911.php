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
                        <h5 class="mt-3">Detail Book!</h5>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-12 mb-2">
                                <input type="text" class="form-control bg-white" value="{{ $bucket->detail->title }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <img src="/img/{{ $bucket->detail->image }}" alt="" style="width: 100%;">
                            </div>
                            <div class="col-md-6">
                                <label for="">Creator</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->detail->creator }}" disabled>
                                <label for="">Penerbit Lokal</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->detail->local_publisher }}" disabled>
                                <label for="">Penerbit</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->detail->original_publisher }}" disabled>
                                <label for="">Kode rak</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->detail->bookcase->name }}" disabled>
                                <label for="">Nomor Rak</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->detail->bookcase->location_bookcase }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow" style="width: 100%;">
                    <div class="card-body">
                        <h4>Durasi peminjaman!</h4>
                        <p class="text-danger">Jika lebih dari 7 hari akan dikenakan biaya denda!</p>
                        <form action="/bucket/{{ $bucket->slug }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Dari</label>
                                    <input type="datetime-local" name="loan_date" id="loan-date" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Sampai</label>
                                    <input type="datetime-local" name="return_date" class="form-control">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-primary w-100" type="submit">Checkout!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("load", function() {
            var now = new Date();
            var utcString = now.toISOString().substring(0,19);
            var year = now.getFullYear();
            var month = now.getMonth() + 1;
            var day = now.getDate();
            var hour = now.getHours();
            var minute = now.getMinutes();
            var second = now.getSeconds();
            var localDatetime = year + "-" +
                (month < 10 ? "0" + month.toString() : month) + "-" +
                (day < 10 ? "0" + day.toString() : day) + "T" +
                (hour < 10 ? "0" + hour.toString() : hour) + ":" +
                (minute < 10 ? "0" + minute.toString() : minute);
            var datetimeField = document.getElementById("loan-date");
            datetimeField.value = localDatetime;
        });
    </script>
@endsection