@extends('layouts.capp')
@section('content')
<div class="container my-3">
    <table class="table">
        <thead>
            <tr>
                <td>No</td>
                <td>Image</td>
                <td>Title</td>
                <td>Admin</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
        @if (!empty($detail_book))
            
        @foreach ($detail_book as $bucket)
        <tr>
            <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
            <td style="vertical-align: middle;" class="w-25"><img src="img/{{ $bucket->detail->image }}" alt="" class="img-responsive img-thumbnail w-100"></td>
            <td style="vertical-align: middle;">{{ $bucket->detail->title }}</td>
            <td style="vertical-align: middle;">{{ $bucket->detail->admin->name }}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <p>Kosong!</p>
        </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection