@extends('layouts.capp')
@section('content')
    <div class="xl:container mx-auto my-6">
        <div class="grid grid-cols-12 gap-4">
            @if (session()->has('addToBucket'))
            <div class="col-span-12">
                <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
                        {{ session('addToBucket') }}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-collapse-toggle="alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>
            @elseif(session()->has('errorToBucket'))
            <div class="col-span-12">
                <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                        {{ session('errorToBucket') }}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-collapse-toggle="alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>
            @endif
            <div class="xl:col-span-4 lg:col-span-4 sm:col-span-12 md:col-span-12 col-span-12">
                <div class="block bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 100%;">
                        <img src="/storage/{{ $detail->image }}" alt="" style="width: 100%;" class="rounded">
                </div>
            </div>
            <div class="xl:col-span-8 lg:col-span-8 sm:col-span-12 md:col-span-12 col-span-12">
                <div class="block p-3 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 100%;">
                        <div class="flex flex-col">
                            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 rounded">
                                <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow-md sm:rounded-lg">
                                        <table class="min-w-full rounded">
                                            <tbody>
                                                <!-- Product 1 -->
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Judul
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$detail->title}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Penulis
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$detail->creator}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Illustrator
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$detail->illustrator}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Penerbit lokal
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$detail->local_publisher}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Penerbit original
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$detail->original_publisher}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Halaman
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$detail->pages}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Stok
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{ ($detail->stock == 0) ? 'kosong' : $detail->stock }}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Edisi
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{ \Carbon\Carbon::parse($detail->edition)->format('d F Y') }}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Kategori
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$detail->category->name}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Bookcase
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$detail->bookcase->name}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Admin
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$detail->admin->name}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if (!is_null(auth()->user()->nisn))
                            @if(!is_null($loan))
                                @if ($loan->status == 'pending' or $loan->status == 'request')
                                    <p class="xl:text-base lg:text-base md:text-sm text-sm text-blue-300 font-medium my-2">Buku yang dipinjam berada dalam status request atau pending</p>
                                @else 
                                    <p class="xl:text-base lg:text-base md:text-sm text-sm text-red-500 font-medium my-2">Buku yang dipinjam berada dalam status cancell, hapus data yang dibatalkan dan kembali meminjam!</p>
                                @endif
                            @elseif(!is_null($bucket))
                                <p class="xl:text-base lg:text-base md:text-sm text-sm text-black font-medium my-2">Buku sudah ada di sessi</p>
                            @elseif($detail->stock == 0)
                                <p class="xl:text-base lg:text-base md:text-sm text-sm text-blue-300 font-medium my-2">Stok tidak tersedia, sedang banyak yang meminjam!</p>
                            @else
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $detail->id }}">
                                        <button class="p-2 rounded hover:shadow-lg hover:shadow-white w-full bg-blue-500 font-medium text-white" type="submit">Pinjam</button>
                                    </form>
                            @endif
                        @else
                        <p class="xl:text-base lg:text-base md:text-sm text-sm text-red-500 font-medium my-2">Jadi member dulu, baru bisa minjem buku gan!</p>
                        @endif
                        
                </div>
            </div>
        </div>
    </div>
@endsection