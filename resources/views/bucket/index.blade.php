@extends('layouts.capp')
@section('content')
@if (session()->has('destroyRow'))
    <div class="w-4/5 mx-auto mt-3">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div id="alert-5" class="flex p-4 mb-4 bg-gray-100 rounded-lg dark:bg-gray-700" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-700 dark:text-gray-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ session('destroyRow') }}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-gray-100 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex h-8 w-8 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white" data-collapse-toggle="alert-5" aria-label="Close">
                      <span class="sr-only">Dismiss</span>
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                  </div>
            </div>
        </div>
    </div>
    @elseif(session()->has('addToLoan'))
    <div class="w-4/5 mx-auto mt-3">
        <div class="grid grid-cols-12">

            <div class="col-span-12">
                <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                        {{ session('addToLoan') }}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-collapse-toggle="alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
    
    @if ($detail_book->count() != 0)
        <livewire:user-bucket-table/>
    @else 
        <div class=" w-4/5 mx-auto my-3">
            <div class="block p-3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100">
                <h5 class="text-2xl font-medium text-gray-900 mb-1">Data masih kosong sahabat!</h5><hr>
                <div class="grid grid-cols-12 gap-4">
                    <div class="xl:col-span-4 lg:col-span-4 md:col-span-4 sm:col-span-12 col-span-12">
                        <img src="/img/clipboard1.png" alt="">
                    </div>
                    <div class="xl:col-span-8 lg:col-span-8 md:col-span-8 sm:col-span-12 col-span-12 my-auto">
                        <div class="block p-3 bg-white rounded-lg border border-gray-200 shadow-md">
                            <p class="text-base font-medium">Data masih kosong, harap meminjam buku terlebih dahulu dan kembali melakukan aksi untuk peminjaman mulai dari menaruh kedalam bucket, konfirmasi dari bucket dan transaksi kesekolah!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    
@endsection