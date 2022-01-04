{{-- @dd($bucket) --}}
<div>
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
                                <label for="">Class & Department</label>
                                <input type="text" class="form-control bg-white" disabled value="{{ auth()->user()->detail_class_department->class_user->class.' '.auth()->user()->detail_class_department->department->abbreviate(auth()->user()->detail_class_department->department->department) }}"> 
                            </div>
                        </div>
                        <h5 class="mt-3">Detail Book!</h5>
                        <hr>
                        <div class="row mt-2">
                            <div class="col-md-12 mb-2">
                                <input type="text" class="form-control bg-white" value="{{ $bucket->book->title }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <img src="/storage/{{ $bucket->book->image }}" alt="" style="width: 100%;">
                            </div>
                            <div class="col-md-6">
                                <label for="">Creator</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->book->creator }}" disabled>
                                <label for="">Penerbit Lokal</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->book->local_publisher }}" disabled>
                                <label for="">Penerbit</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->book->original_publisher }}" disabled>
                                <label for="">Kode rak</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->book->bookcase->name }}" disabled>
                                <label for="">Nomor Rak</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->book->bookcase->location_bookcase }}" disabled>
                                <label for="">Stok</label>
                                <input type="text" class="form-control bg-white" value="{{ $bucket->book->stock }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow" style="width: 100%;">
                    <div class="card-body">
                            <h4>Durasi peminjaman!</h4>
                            <p class="p-0 m-0">Jika lebih dari 7 hari akan dikenakan biaya denda!</p>
                            <p class="text-primary p-0 m-0">Note : biaya denda 500 perak perhari!</p>
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Dari</label>
                                        <input type="date"  id="loan-date" class="form-control bg-white" readonly wire:model="loan_date">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Sampai</label>
                                        {{-- <input type="date" class="form-control" wire:model="return_date"> --}}
                                        <input type="date" wire:model="return_date" name="return_date" class="form-control">
                                    </div>
                                    @error('return_date')
                                        <div class="col-md-12">
                                            <p class="m-0 p-0 text-danger">{{ $message }}</p>
                                        </div>
                                    @enderror
                                    <div class="col-md-12 p-3">
                                        @if ($costP)
                                        <p class="m-0 p-0">Cost yang harus dibayarkan : Rp.{{ number_format($cost) }}</p>
                                        @else
                                        <p class="m-0 p-0 text-danger">Input pengembalian tidak boleh kurang dari input peminjaman</p>
                                        @endif
                                    </div>
                                    <div class="col-md-12">
                                        <p class="m-0 p-0">Tipe metode pembayaran</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="kas" wire:model="type">
                                            <label class="form-check-label"  for="flexRadioDefault1">
                                                Kas
                                            </label>
                                            @if ($typeP)
                                                <p class="m-0 p-0 text-primary">{{ $typeP }}</p>
                                            @endif
                                            
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="tunai" checked wire:model="type">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Tunai
                                            </label>
                                        </div>
                                        @error('type')
                                            <p class="m-0 p-0 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <button class="btn btn-primary w-100"  wire:click.prevent="storeLoan()" type="button">Checkout!</button>
                                    </div>
                                </div>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</div>
