@extends('user.layouts.capp')
@section('content')
    <div class="w-4/5 mx-auto my-3">
        <livewire:user-book-table :ids="$collection->id"/>
    </div>
@endsection