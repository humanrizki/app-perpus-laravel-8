@extends('layouts.capp')
@section('content')
    @if (session()->has('errorToLoan'))
        <div class="container my-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class=" m-0"> <i class="bi bi-x-circle-fill"></i>{{ session('errorToLoan') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    
                <livewire:user-bucket :bucket="$bucket"/>
            
                
@endsection