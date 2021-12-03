@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Title</td>
                    <td>From</td>
                    <td>To</td>
                    <td>Forfeit</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loan->bucket->detail->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($loan->loan_date)->format('d/m/y H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($loan->return_date)->diffInDays($loan->return_date) }}</td>
                        <td>Rp.{{ number_format($loan->forfeit) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection