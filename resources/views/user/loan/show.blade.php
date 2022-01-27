@extends('user.layouts.capp')
@section('content')
    <div class="xl:container w-4/5  mx-auto xl:mx-auto my-3">
        @if (session()->has('cancellLoan'))
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                            {{ session('cancellLoan') }}
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-collapse-toggle="alert-1" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="xl:grid md:grid lg:grid sm:grid xl:grid-cols-12 md:grid-cols-12 lg:grid-cols-12 sm:grid-cols-12 xl:gap-4 lg:gap-4 md:gap-y-4 sm:gap-y-4 gap-y-4">
            <div class="xl:col-span-6 md:col-span-12 lg:col-span-6 sm:col-span-12 mb-4">
                <div class="block p-3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 100%;">
                    <h5 class="text-2xl font-medium text-gray-900">Personal details!</h5><hr class="border border-5">
                    <div class="grid grid-cols-12 gap-x-4">
                        <div class="col-span-6">
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Name</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ auth()->user()->name }}" disabled>
                        </div>
                        <div class="col-span-6">
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Username</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ auth()->user()->username }}" disabled>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-x-4">
                        <div class="col-span-6">
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Phone</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ substr(auth()->user()->phone,0,4) }}*******" disabled>
                        </div>
                        <div class="col-span-6">
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Class & Department</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" disabled value="{{ auth()->user()->detail_class_department->class_user->class.' '.auth()->user()->detail_class_department->department->abbreviate(auth()->user()->detail_class_department->department->department) }}"> 
                        </div>
                    </div>
                    <h5 class="mt-3 text-2xl font-medium text-gray-900">Detail Book!</h5><hr class="border border-5">
                    <div class="grid grid-cols-12 mt-2 gap-x-4">
                        <div class="col-span-12 mb-2">
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $loan->book->title }}" disabled>
                        </div>
                        <div class="col-span-6">
                            <img src="/storage/{{ $loan->book->image }}" alt="" class="rounded shadow border" style="width: 100%;">
                        </div>
                        <div class="col-span-6">
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Creator</label>
                            <input type="text" class=" p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $loan->book->creator }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Penerbit Lokal</label>
                            <input type="text" class=" p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $loan->book->local_publisher }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Penerbit</label>
                            <input type="text" class=" p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $loan->book->original_publisher }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Kode rak</label>
                            <input type="text" class=" p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $loan->book->bookcase->name }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Nomor Rak</label>
                            <input type="text" class=" p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $loan->book->bookcase->location_bookcase }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Stok</label>
                            <input type="text" class=" p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $loan->book->stock }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:col-span-6 md:col-span-12 lg:col-span-6 sm:col-span-12">
                <div class="block p-3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width:100%">
                        <h5 class="text-2xl font-medium text-gray-900">Detail peminjaman buku</h5>
                        <hr class="border border-5">
                        <label for="totalDenda" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Total denda</label>
                        <input type="text" id="totalDenda" disabled value="{{ $loan->forfeit }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                        <label for="admin" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Admin</label>
                        <input type="text" id="admin" disabled value="{{ $loan->book->admin->name }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                        <label for="status" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Status</label>
                        <input type="text" id="status" disabled value="{{ $loan->status }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                        <label for="type" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Tipe pembayaran</label>
                        <input type="text" id="type" disabled value="{{ $loan->type }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                        @if ($loan->status != 'borrow')
                            <form action="" method="POST" class="mt-3">
                                @csrf
                                @if ($loan->status == 'request' or $loan->status == 'pending')
                                    @method('put')
                                    <button type="submit" class="p-2 rounded bg-red-600 shadow-lg font-medium text-white w-full mb-2 {{ ($loan->status == 'request' or $loan->status == 'pending') ? '': 'opacity-50 cursor-not-allowed' }}" >Batalkan!</button>
                                @elseif($loan->status == 'cancell')
                                    @method('delete')
                                    <button type="submit" class="p-2 rounded bg-red-600 shadow-lg font-medium text-white w-full mt-2 {{ ($loan->status == 'cancell') ? '': 'opacity-50 cursor-not-allowed disabled' }}">Hapus peminjaman!</button>
                                @endif
                            </form>
                        @else
                        @endif
                </div>
            </div>

        </div>
    </div>
@endsection