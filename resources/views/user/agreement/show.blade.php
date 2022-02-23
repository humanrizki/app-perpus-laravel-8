@extends('user.layouts.capp')
@section('content')
    <div class="xl:container w-4/5 mx-auto my-3">
        <div class="grid grid-cols-12 gap-4">
            <div class="xl:col-span-4 lg:col-span-4 sm:col-span-12 md:col-span-12 col-span-12">
                <div class="block bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" style="width: 100%;">
                    <img src="/storage/{{$homeroom_message->loan_report->book->image }}" alt="" style="width: 100%;" class="rounded">
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
                                                        {{$homeroom_message->loan_report->book->title}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Status Agreement
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$homeroom_message->status}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Status Loan
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$homeroom_message->loan_report->status}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Forfeit
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$homeroom_message->loan_report->forfeit}}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Total kas
                                                    </td>
                                                    @if (!is_null($message))
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$message->total_kas}}
                                                    </td>
                                                    @else
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        Belum ada total
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Change
                                                    </td>
                                                    @if (!is_null($message))
                                                        <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $message->total_kas - $homeroom_message->loan_report->forfeit}}
                                                        </td>
                                                    @else
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        belum ada kembalian
                                                    </td>
                                                    @endif
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Loan date
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{ \Carbon\Carbon::parse($homeroom_message->loan_report->loan_date)->format('d F Y') }}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Return date
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{ \Carbon\Carbon::parse($homeroom_message->loan_report->return_date)->format('d F Y') }}
                                                    </td>
                                                </tr>
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        Admin
                                                    </td>
                                                    <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        {{$homeroom_message->loan_report->book->admin->name}}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 mt-2">
                            <div class="col-span-12">
                                <textarea name="" id=""  class="block p-2 border border-2 h-28 rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" readonly>{{ $homeroom_message->message }}</textarea>
                            </div>
                            <div class="col-span-2 inline-flex justify-center items-center">
                                <p class="m-0 p-0 text-2xl font-black">
                                    <i class="bi bi-arrow-return-right "></i>
                                </p>
                            </div>
                            <div class="col-span-10">
                                @if (!is_null($message))
                                <textarea name="" id=""  class="block p-2 border border-2 h-28 rounded mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 w-full" readonly>{{ $message->reply_message }}</textarea>
                                @else
                                <div class="flex justify-center items-center border border-2 p-2 rounded">
                                    <p>Belom ada balasan</p>
                                </div>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
