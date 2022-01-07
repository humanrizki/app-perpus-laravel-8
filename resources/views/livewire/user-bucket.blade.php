{{-- @dd($bucket) --}}
<div>
    <div class="xl:container  mx-auto xl:mx-auto my-3" style="width:90%;">
        <h3 class="my-3 text-2xl font-medium text-gray-900">Checkout your book!</h3>
        <div class="xl:grid md:grid lg:grid sm:grid xl:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 sm:grid-cols-12 xl:gap-4 lg:gap-4 md:gap-y-4 sm:gap-y-4 gap-y-4">
            
            <div class="xl:col-span-6 md:col-span-12 lg:col-span-6 sm:col-span-12 mb-4">
                <div class="block p-3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 100%;">
                        <h5 class="text-2xl font-medium text-gray-900">Personal details!</h5>
                        <hr>
                        <div class="grid grid-cols-12 gap-x-4">
                            <div class="col-span-6">
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Name</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ auth()->user()->name }}" disabled>
                            </div>
                            <div class="col-span-6">
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Username</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ auth()->user()->username }}" disabled>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-x-4">
                            <div class="col-span-6">
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Phone</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ substr(auth()->user()->phone,0,4) }}*******" disabled>
                            </div>
                            <div class="col-span-6">
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Class & Department</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" disabled value="{{ auth()->user()->detail_class_department->class_user->class.' '.auth()->user()->detail_class_department->department->abbreviate(auth()->user()->detail_class_department->department->department) }}"> 
                            </div>
                        </div>
                        <h5 class="mt-3 text-2xl font-medium text-gray-900">Detail Book!</h5>
                        <hr>
                        <div class="grid grid-cols-12 mt-2 gap-x-4">
                            <div class="col-span-12 mb-2">
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $bucket->book->title }}" disabled>
                            </div>
                            <div class="col-span-6">
                                <img src="/storage/{{ $bucket->book->image }}" alt="" class="rounded shadow border" style="width: 100%;">
                            </div>
                            <div class="col-span-6">
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Creator</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $bucket->book->creator }}" disabled>
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Penerbit Lokal</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $bucket->book->local_publisher }}" disabled>
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Penerbit</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $bucket->book->original_publisher }}" disabled>
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Kode rak</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $bucket->book->bookcase->name }}" disabled>
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Nomor Rak</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $bucket->book->bookcase->location_bookcase }}" disabled>
                                <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Stok</label>
                                <input type="text" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $bucket->book->stock }}" disabled>
                            </div>
                        </div>
                </div>
            </div>
            <div class="xl:col-span-6 md:col-span-12 lg:col-span-6 sm:col-span-12">
                <div class="block p-3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 100%;">
                            <h4 class="text-2xl font-medium text-gray-900">Durasi peminjaman!</h4>
                            <p class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Jika lebih dari 7 hari akan dikenakan biaya denda!</p>
                            <p class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-blue-700 dark:text-gray-300">Note : biaya denda 500 perak perhari!</p>
                            <form action="" method="POST">
                                @csrf
                                <div class="grid grid-cols-12 gap-x-4">
                                    <div class="col-span-6">
                                        <label for="loan-date" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Dari</label>
                                        <input type="date"  id="loan-date" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" readonly wire:model="loan_date">
                                    </div>
                                    <div class="col-span-6">
                                        <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Sampai</label>
                                        {{-- <input type="date" class="form-control" wire:model="return_date"> --}}
                                        <input type="date" wire:model="return_date" name="return_date" class="block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                                    </div>
                                    @error('return_date')
                                        <div class="col-span-12">
                                            <p class="m-0 p-0 text-danger">{{ $message }}</p>
                                        </div>
                                    @enderror
                                    <div class="col-span-12 p-3">
                                        @if ($costP)
                                        <p class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Cost yang harus dibayarkan : Rp.{{ number_format($cost) }}</p>
                                        @else
                                        <p class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-red-400 dark:text-gray-300 text-danger">Input pengembalian tidak boleh kurang dari input peminjaman</p>
                                        @endif
                                    </div>
                                    <div class="col-span-12">
                                        <p class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Tipe metode pembayaran</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="kas" wire:model="type">
                                            <label class="form-check-label p-0 m-0 text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300"  for="flexRadioDefault1">
                                                Kas
                                            </label>
                                            @if ($typeP)
                                                <p class="m-0 p-0 block my-1 text-sm xl:text-lg md:text-base font-medium text-blue-700 dark:text-gray-300">{{ $typeP }}</p>
                                            @endif
                                            
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="tunai" checked wire:model="type">
                                            <label class="form-check-label p-0 m-0 text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300" for="flexRadioDefault2">
                                                Tunai
                                            </label>
                                        </div>
                                        @error('type')
                                            <p class="m-0 p-0 text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-12 mt-3">
                                        <button class="p-2 bg-blue-700 w-full rounded text-white"  wire:click.prevent="storeLoan()" type="button">Checkout!</button>
                                    </div>
                                </div>
                            </form>
                        
                </div>
            </div>
        </div>
    </div>
    

</div>
