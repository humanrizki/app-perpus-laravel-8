@extends('layouts.capp')
@section('content')
    @foreach ($detail_book as $detail)
        {{ $detail->title }}
    @endforeach
@endsection