@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
@endsection
@section('content')
    <div class="container-fluid bg-white p-3">
        <div class="row">
            @if (session()->has('errorToTransaction'))
                <div class="col-md-8 offset-md-2">
                    <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                            {{ session('errorToTransaction') }}
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-collapse-toggle="alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                </div>
            @endif
            @if (session()->has('cancellLoan'))
                <div class="col-md-8 offset-md-2">
                    <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                            {{ session('cancellLoan') }}
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-collapse-toggle="alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                </div>
            @endif
            <div class="col-md-8 offset-md-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card hover:shadow-lg mt-2">
                            <div class="card-body">
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Nama : {{ $loan->user->name }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Email : {{ $loan->user->email }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Phone : {{ $loan->user->phone }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Gender : {{ $loan->user->gender }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card hover:shadow-lg mt-2">
                            <div class="card-body">
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Title book : {{ $loan->book->title }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Book pages : {{ $loan->book->pages }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Category : {{ $loan->book->category->name }}</h5>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-8 offset-md-2">
                <div class="card mt-4 hover:shadow-lg">
                    <div class="card-body">
                        @if ($loan->status == 'request')
                        <form action="" method="POST">
                            @csrf
                            <input type="hidden" name="loan_report_id" value="{{ $loan->id }}">
                            <div class="form-group">
                                <label for="denda" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Denda</label>
                                <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $loan->forfeit }}" readonly id="denda" name="cost">
                            </div>
                            <div class="form-group">
                                <label for="nominal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nominal yang dibayarkan</label>
                                @if ($message)
                                <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nominal" name="nominal" value="{{ $message->total_kas }}" readonly>
                                <p class="p-0 m-0 text-sm font-medium text-sky-400">Nominal ini sudah dari persetujuan walas!</p>
                                @else
                                <input type="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="nominal" name="nominal">
                                @endif
                                @error('nominal')
                                    <p class="text-sm font-medium text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="return_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tanggal peminjaman!</label>
                                <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly value="{{ $loan->loan_date }}">
                            </div>
                            <div class="form-group">
                                <label for="return_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tanggal pengembalian!</label>
                                <input type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly value="{{ $loan->return_date }}">
                            </div>
                                <label for="day-of-payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Hari pembayaran</label>
                                <div class="relative">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input datepicker datepicker-autohide datepicker-orientation="bottom right" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" name="day_of_payment" datepicker-format="yyyy-mm-dd">
                                </div>
                                <p class="p-0 m-0 text-sm font-medium text-sky-400">Nilai tanggal tidak boleh lebih dari hari pengembalian atau kurang dari tanggal peminjaman!</p>
                            <div class="form-group mt-3 mb-0">
                                <button type="submit" class="p-2 rounded-md text-white bg-emerald-300 hover:shadow hover:bg-emerald-400 w-full">Submit</button>
                            </div>
                        </form>
                        <p class="text-center font-medium p-0 my-2 ">Atau batalkan</p>
                        <form action="/dashboard/loans/{{$loan->slug}}/cancell" method="post">
                            @csrf
                            <button class="p-2 rounded-md text-white bg-red-300 hover:shadow hover:bg-red-400 w-full" type="submit">Batalkan</button>
                        </form>
                        @elseif($loan->status == 'pending')
                            <div class="flex flex-wrap justify-center">
                                <img src="/img/pending.png" alt="" class="md:w-80 sm:w-full">
                                <div class="md:w-64 sm:w-full self-center">
                                    <p class="mb-3 font-medium text-sm text-gray-900">Data peminjaman masih menunggu persetujuan dari walas untuk dapat melakukan transaksi!</p>
                                </div>
                            </div>
                        @elseif($loan->status == 'cancell')
                        <div class="flex flex-wrap justify-center">
                            <img src="/img/cancell.png" alt="" class="md:w-80 sm:w-full">
                            <div class="md:w-64 sm:w-full self-center">
                                <p class="m-0 p-0 text-gray-900 font-medium text-sm">Persetujuan bernilai "Tidak setuju", transaksi tidak bisa dilanjutkan!</p>
                                <form action=""></form>
                            </div>
                        </div>
                        @else
                            <div class="flex flex-wrap justify-center">
                                <img src="/img/accept.png" alt="" class="md:w-80 sm:w-full">
                                <div class="md:w-64 sm:w-full self-center">
                                    <p class="m-0 p-0 text-sm font-medium text-gray-900">Transaksi telah dilakukan, nanti jika user sudah mengembalikan buku pindah lah ke page transaction show yang mengambil dari data peminjaman ini!.</p>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
@section('script')
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/datepicker.bundle.js"></script>
@endsection