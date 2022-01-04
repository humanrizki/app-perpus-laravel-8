@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        @if (session()->has('cancellLoan'))
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <h5 class=" m-0"> <i class="bi bi-check-circle-fill"></i>{{ session('cancellLoan') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
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
                                <label for="">Class & Department</label>
                                <input type="text" class="form-control bg-white" disabled value="{{ auth()->user()->detail_class_department->class_user->class.' '.auth()->user()->detail_class_department->department->abbreviate(auth()->user()->detail_class_department->department->department) }}"> 
                            </div>
                        </div>
                        <h5 class="mt-3">Detail Book!</h5>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-12 mb-2">
                                <input type="text" class="form-control bg-white" value="{{ $loan->book->title }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <img src="/storage/{{ $loan->book->image }}" alt="" style="width: 100%;">
                            </div>
                            <div class="col-md-6">
                                <label for="">Creator</label>
                                <input type="text" class="form-control bg-white" value="{{ $loan->book->creator }}" disabled>
                                <label for="">Penerbit Lokal</label>
                                <input type="text" class="form-control bg-white" value="{{ $loan->book->local_publisher }}" disabled>
                                <label for="">Penerbit</label>
                                <input type="text" class="form-control bg-white" value="{{ $loan->book->original_publisher }}" disabled>
                                <label for="">Kode rak</label>
                                <input type="text" class="form-control bg-white" value="{{ $loan->book->bookcase->name }}" disabled>
                                <label for="">Nomor Rak</label>
                                <input type="text" class="form-control bg-white" value="{{ $loan->book->bookcase->location_bookcase }}" disabled>
                                <label for="">Stok</label>
                                <input type="text" class="form-control bg-white" value="{{ $loan->book->stock }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow" style="width:100%">
                    <div class="card-body">
                        <h5>Detail peminjaman buku</h5>
                        <hr>
                        <label for="totalDenda">Total denda</label>
                        <input type="text" id="totalDenda" disabled value="{{ $loan->forfeit }}" class="form-control bg-white">
                        <label for="admin">Admin</label>
                        <input type="text" id="admin" disabled value="{{ $loan->book->admin->name }}" class="form-control bg-white">
                        <label for="status">Status</label>
                        <input type="text" id="status" disabled value="{{ $loan->status }}" class="form-control bg-white">
                        <label for="type">Type pembayaran</label>
                        <input type="text" id="type" disabled value="{{ $loan->type }}" class="form-control bg-white">
                            <form action="" method="POST" class="mt-3">
                                @csrf
                                @if ($loan->status == 'request' or $loan->status == 'pending')
                                    @method('put')
                                @elseif($loan->status == 'cancell')
                                    @method('delete')
                                @endif
                                <button class="btn btn-danger w-100 {{ ($loan->status == 'request' or $loan->status == 'pending') ? '': 'disabled' }}">Batalkan!</button><hr>
                                <button class="btn btn-danger w-100 {{ ($loan->status == 'cancell') ? '': 'disabled' }}">Hapus peminjaman!</button>
                            </form>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection