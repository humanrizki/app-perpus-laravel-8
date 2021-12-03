@extends('layouts.capp')
@section('content')
    <div class="container my-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Judul</td>
                    <td>Durasi Pinjam</td>
                    <td>Denda</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($loans as $loan)
                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $loan->bucket->detail->title }}</td>
                        <td>{{ \Carbon\Carbon::parse($loan->return_date)->locale('id_ID')->diffForHumans(\Carbon\Carbon::now()) }}</td>
                        <td>Rp.{{ number_format($loan->forfeit) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection