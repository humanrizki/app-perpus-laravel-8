@extends('admin.layouts.app')
@section('content')
<div class="container bg-white p-3">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="row">
                <div class="col-md-6">
                    <a href="/dashboard/charts/students">
                    <div class="card hover:shadow-lg mt-2 w-full">
                        <div class="card-body w-auto">
                                <div class="flex flex-col items-center w-full ">
                                    <img src="/img/students.png" alt="" class="w-40">
                                    <p class="m-0 p-0 font-medium text-base">Students</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="/dashboard/charts/students/loans">
                        <div class="card hover:shadow-lg mt-2 w-full">
                            <div class="card-body w-auto">
                                    <div class="flex flex-col items-center w-full ">
                                        <img src="/img/bookreturn.png" alt="" class="w-40">
                                        <p class="m-0 p-0 font-medium text-base">Loans</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                </div>
                <div class="col-md-6">
                    <a href="/dashboard/charts/students/transactions">
                        <div class="card hover:shadow-lg mt-2 w-full">
                            <div class="card-body w-auto">
                                    <div class="flex flex-col items-center w-full ">
                                        <img src="/img/transaction-history.png" alt="" class="w-40">
                                        <p class="m-0 p-0 font-medium text-base">Transactions</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection