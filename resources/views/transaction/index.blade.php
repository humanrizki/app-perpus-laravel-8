@extends('layouts.capp')
@section('content')
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Payment Date</th>
                    <th>Cost</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->loan_report->book->title }}</td>
                        <td>{{ $transaction->day_of_payment }}</td>
                        <td>{{ $transaction->cost }}</td>
                        <td>{{ $transaction->nominal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection