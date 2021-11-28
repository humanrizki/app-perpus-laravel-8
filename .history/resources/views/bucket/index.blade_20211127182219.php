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
        @if (!empty($detail_book))
            
        @foreach ($detail_book as $detail)
        <tr>
            <td style="vertical-align: middle;">{{ $loop->iteration }}</td>
            <td style="vertical-align: middle;"><img src="img/{{ $detail->image }}" alt="" class="img-responsive img-thumbnail w-100"></td>
            <td style="vertical-align: middle;">{{ $detail->title }}</td>
            <td style="vertical-align: middle;">{{ $detail->admin->name }}</td>
        </tr>
        @endforeach
        
        @endif
        </tbody>
    </table>
</div>
@endsection