@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
@endsection
@section('content')
    <div class="container-fluid bg-white p-3">
        <div class="row">
            @if (session()->has('errorWithMessage'))
                <div class="col-md-8 offset-md-2">
                    <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                          {{ session('errorWithMessage') }}
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-collapse-toggle="alert-2" aria-label="Close">
                          <span class="sr-only">Close</span>
                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                      </div>
                </div>
            @endif
            @if (session()->has('successWithMessage'))
                <div class="col-md-8 offset-md-2">
                    <div id="alert-2" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-red-200" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                          {{ session('successWithMessage') }}
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-collapse-toggle="alert-2" aria-label="Close">
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
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Nama : {{ $message->loan_report->user->name }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Email : {{ $message->loan_report->user->email }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Phone : {{ $message->loan_report->user->phone }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Gender : {{ $message->loan_report->user->gender }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card hover:shadow-lg mt-2">
                            <div class="card-body">
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Title book : {{ $message->loan_report->book->title }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Book pages : {{ $message->loan_report->book->pages }}</h5>
                                <h5 class="m-0 p-0 text-gray-900 font-medium">Category : {{ $message->loan_report->book->category->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 offset-md-2 mt-3">
                <div class="card hover:shadow-lg">
                    <div class="card-body">
                        @if ($message->status == 'pending')
                        <div class="flex flex-wrap items-center">
                            <img src="/img/check_order.png" alt="" class="md:w-1/2 sm:w-4/5">
                            <form action="" method="POST" class="md:w-1/2 sm:w-4/5">
                                @csrf
                                <p class="m-0 p-0 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                                    {{ $message->message }}
                                </p>
                                <div class="form-group my-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="flexRadioDefault1" value="agree" checked>
                                        <label class="form-check-label block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"  for="flexRadioDefault1">
                                            Setuju
                                        </label>
                                        
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="flexRadioDefault2" value="disagree">
                                        <label class="form-check-label block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="flexRadioDefault2">
                                            Tidak Setuju
                                        </label>
                                    </div>
                                    @error('type')
                                        <p class="m-0 p-0 text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group my-1">
                                    <label for="cost" class="m-0 p-0 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Jumlah cost</label>
                                    <input type="number" name="cost" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $message->loan_report->forfeit }}" readonly>
                                </div>
                                <div class="form-group my-1">
                                    <label for="total" class="m-0 p-0 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Jumlah uang kas</label>
                                    <input type="number" id="total" name="total" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @error('total')
                                        <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                                    @else
                                        <p class="text-sm text-sky-400 font-medium">Note : jumlah uang kas murid yang meminjam harus lebih dari jumlah cost, jika "Tidak setuju" field jumlah tetap wajib diisi!</p>

                                    @enderror
                                </div>
                                <div class="form-group my-1">
                                    <label for="statement" class="m-0 p-0 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Alasan kamu</label>
                                    <textarea id="message" rows="4" class="block p-2 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a statement...." name="reply"></textarea>
                                    @error('reply')
                                        <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                                    @else
                                        <p class="text-sm text-sky-400 font-medium">Note : Jika tidak menulis dalam keadaan apapun akan diberikan default pesan, tenang saja!</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="p-2 rounded bg-sky-400 font-medium hover:bg-sky-500 w-full text-white" type="submit">Submit</button>
                                </div>
                            </form> 
                        </div>
                        @else
                        <div class="flex flex-wrap items-center">
                            <img src="/img/deal.png" alt="" class="md:w-1/2 sm:w-4/5">
                            <div class="md:w-1/2 sm:w-4/5">
                                <p class="font-medium text-sm text-sky-400">Anda telah memberikan persetujuan kedalam data peminjaman!</p>
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
@endsection