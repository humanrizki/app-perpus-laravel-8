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
            <td style="vertical-align: middle;">
                @if ($bucket->is_loan == 1)
                <a href="/lists/{{ $bucket->detail->slug }}" class="btn btn-primary mb-2"><i class="fas fa-bars"></i></a>
                @else
                <a href="/bucket/{{ $bucket->slug }}" class="btn btn-primary mb-1"><i class="fas fa-money-bill"></i></a>
                @endif
                <form action="/bucket/{{ $bucket->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                </form>
            </td>
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