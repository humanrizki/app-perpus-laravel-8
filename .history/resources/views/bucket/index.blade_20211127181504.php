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
            <td>{{ $loop->iteration }}</td>
            <td  class="border"><img src="img/{{ $detail->image }}" alt="" style="width: 25%;"></td>
            <td>{{ $detail->title }}</td>
            <td>{{ $detail->admin->name }}</td>
        </tr>
        @endforeach
        
        @endif
        </tbody>
    </table>
</div>
@endsection