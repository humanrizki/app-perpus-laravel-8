@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@endsection
@section('content')
<div class="container-fluid bg-white p-3">
<div class="row">
    <div class="col-md-8 offset-md-2">
        @if (session()->has('errorToReturn'))
        <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
            <svg class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
              {{ session('errorToReturn') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-collapse-toggle="alert-2" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
        @endif
    </div>
    <div class="col-md-8 offset-md-2">
        <div class="row">
            <div class="col-md-6">
                <div class="card hover:shadow-lg mt-2">
                    <div class="card-body">
                        <p class="m-0 p-0 text-gray-900 font-medium">Nama : {{ $transaction->loan_report->user->name }}</p>
                        <p class="m-0 p-0 text-gray-900 font-medium">Email : {{ $transaction->loan_report->user->email }}</p>
                        <p class="m-0 p-0 text-gray-900 font-medium">Phone : {{ $transaction->loan_report->user->phone }}</p>
                        <p class="m-0 p-0 text-gray-900 font-medium">Gender : {{ $transaction->loan_report->user->gender }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card hover:shadow-lg mt-2">
                    <div class="card-body">
                        <p class="m-0 p-0 text-gray-900 font-medium">Title book : {{ $transaction->loan_report->book->title }}</p>
                        <p class="m-0 p-0 text-gray-900 font-medium">Book pages : {{ $transaction->loan_report->book->pages }}</p>
                        <p class="m-0 p-0 text-gray-900 font-medium">Category : {{ $transaction->loan_report->book->category->name }}</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <div class="col-md-8 offset-md-2 mt-2">
        <div class="card hover:shadow-lg">
            <div class="card-body">
                <div class="flex  mx-auto flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8 w-full mx-auto">
                        <div class="inline-block py-2 min-w-full  sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow-md sm:rounded-lg">
                                <table class="min-w-full">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Date of payment
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Cost
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Nominal
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Change
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Type payment
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Loan date
                                            </th>
                                            <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                Return date
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Product 1 -->
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ \Carbon\Carbon::parse($transaction->day_of_payment)->format('d F Y') }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-900 font-medium whitespace-nowrap dark:text-gray-400">
                                                {{ $transaction->cost }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-900 font-medium whitespace-nowrap dark:text-gray-400">
                                                {{ $transaction->nominal }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-900 font-medium whitespace-nowrap dark:text-gray-400">
                                                {{ $transaction->nominal - $transaction->cost }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-900 font-medium whitespace-nowrap dark:text-gray-400">
                                                {{ $transaction->loan_report->type }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-900 font-medium whitespace-nowrap dark:text-gray-400">
                                                {{ \Carbon\Carbon::parse($transaction->loan_report->loan_date)->format('d F Y') }}
                                            </td>
                                            <td class="py-4 px-6 text-sm text-gray-900 font-medium whitespace-nowrap dark:text-gray-400">
                                                {{ \Carbon\Carbon::parse($transaction->loan_report->return_date)->format('d F Y') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="col-md-8 offset-md-2">
            <div class="card hover:shadow-lg mt-2">
                <div class="card-body">
                    <div class="flex flex-wrap justify-center">
                        <img src="/img/successTransaction.png" alt="" class="md:w-80 sm:w-full">
                        <div class="md:w-64 sm:w-full self-center">
                            <p class="m-0 p-0 text-sm font-medium text-gray-900">Transaksi telah dilakukan, setelah buku dikembalikan kelik untuk menandai telah dikembalikan dan data buku peminjaman lama akan dibuang dan digantikan.</p>
                            <form action="" method="POST" class="mt-1 mb-1">
                                @csrf
                                <button type="submit" class="w-full p-2 rounded text-white bg-green-400 font-medium" >Submit</button>
                                <p class="text-sm text-sky-300 mt-2 underline decoration-solid underline-offset-4 font-medium">Tandai transaksi ini telah usai setelah user mengembalikan buku!</p>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
@endsection