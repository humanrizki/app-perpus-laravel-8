@extends('user.layouts.capp')
@section('content')
    <div class="xl:container w-4/5 mx-auto my-3">
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
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $transaction->loan_report->book->title }}" disabled>
                        </div>
                        <div class="col-span-6">
                            <img src="/storage/{{ $transaction->loan_report->book->image }}" alt="" class="rounded shadow border" style="width: 100%;">
                        </div>
                        <div class="col-span-6">
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Creator</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $transaction->loan_report->book->creator }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Penerbit Lokal</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $transaction->loan_report->book->local_publisher }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Penerbit</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $transaction->loan_report->book->original_publisher }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Kode rak</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $transaction->loan_report->book->bookcase->name }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Nomor Rak</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $transaction->loan_report->book->bookcase->location_bookcase }}" disabled>
                            <label for="" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Stok</label>
                            <input type="text" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" value="{{ $transaction->loan_report->book->stock }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:col-span-6 md:col-span-12 lg:col-span-6 sm:col-span-12">
                <div class="block p-3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width:100%">
                        <h5 class="text-2xl font-medium text-gray-900">Detail Transaction</h5>
                        <hr class="border border-5">
                        <div class="grid grid-cols-12 gap-x-4">
                            <div class="col-span-6">
                                <label for="totalDenda" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Total forfeit</label>
                                <input type="text" id="totalDenda" disabled value="{{ $transaction->loan_report->forfeit }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                            </div>
                            <div class="col-span-6">
                                <label for="nominal" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Nominal</label>
                                <input type="text" id="nominal" disabled value="{{ $transaction->nominal }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                            </div>
                            <div class="col-span-6">
                                <label for="status" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Status Loan</label>
                                <input type="text" id="status" disabled value="{{ $transaction->loan_report->status }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                            </div>
                            <div class="col-span-6">
                                <label for="status-t" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Status Transaction</label>
                                <input type="text" id="status-t" disabled value="{{ $transaction->status }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                            </div>
                            <div class="col-span-6">
                                <label for="type" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Type payment</label>
                                <input type="text" id="type" disabled value="{{ $transaction->loan_report->type }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                            </div>
                            <div class="col-span-6">
                                <label for="admin" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Admin</label>
                                <input type="text" id="admin" disabled value="{{ $transaction->loan_report->book->admin->name }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                            </div>
                            <div class="col-span-6">
                                <label for="date" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Date of Payment</label>
                                <input type="text" id="date" disabled value="{{ \Carbon\Carbon::parse($transaction->day_of_payment)->format('d F Y') }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                            </div>
                            <div class="col-span-6">
                                <label for="change" class="p-0 m-0 block text-sm xl:text-lg md:text-base font-medium text-gray-900 dark:text-gray-300">Change</label>
                                <input type="text" id="change" disabled value="{{ $transaction->nominal-$transaction->cost }}" class="p-2 bg-white border border-2 block rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full">
                            </div>
                        </div>
                        <div class="col-span-12">
                            <div class="block rounded mt-3 text-sm font-medium text-gray-900 dark:text-gray-300 w-full border border-black bg-white p-2">
                                Jika kamu sudah mencapai h-1, persiapkan untuk mengembalikan buku tersebut ke perpustakaan kembali dan konfirmasilah ke admin!
                            </div>
                        </div>
                        <div class="col-span-12">
                                    <a href="/transaction/{{ $transaction->slug }}/print" class="block p-2 font-medium mt-3 text-white bg-blue-500 mb-1 w-max ml-auto rounded shadow">Klik untuk menjadikan pdf / cetak</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection