@extends('layouts.capp')
@section('content')
    @foreach ($detail_book as $detail)
        <table class="table">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Title</td>
                    <td>Admin</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_book as $detail)
                <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail->title }}</td>
                        <td>{{ $detail->admin->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection