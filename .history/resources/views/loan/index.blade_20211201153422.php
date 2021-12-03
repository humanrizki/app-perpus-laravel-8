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
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loan->bucket->detail->title }}</td>
                        <td>{{ $loop->iteration }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection