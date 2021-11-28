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
                <tr>
                @foreach ($detail_book as $detail)
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail->title }}</td>
                        <td>{{ $detail->admin_id }}</td>
                        @endforeach
                </tr>
            </tbody>
        </table>
    @endforeach
@endsection