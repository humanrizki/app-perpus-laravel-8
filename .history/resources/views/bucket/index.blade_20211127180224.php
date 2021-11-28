@extends('layouts.capp')
@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <td>No</td>
                <td>Image</td>
                <td>Title</td>
                <td>Admin</td>
            </tr>
        </thead>
        <tbody>
        @foreach ($detail_book as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="img/{{ $detail->image }}" alt="" style="width: 100%;"></td>
                <td>{{ $detail->title }}</td>
                <td>{{ $detail->admin->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection