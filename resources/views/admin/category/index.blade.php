@extends('admin.layouts.app')
@section('head')
<script src="https://cdn.tailwindcss.com"></script>
@livewireStyles
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.7.1/cdn.min.js" integrity="sha512-gJEPTYpQVWBbJrUDHGLwMaDXRtGRnAym+3egw7LDYzSzMEqSWSj64wW5JZxcgJFSLXSf93t5sE9shlQDZsbyAQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('content')
    <div class="container-fluid bg-white p-3">
        @livewire('category')
        {{-- <livewire:category-table/> --}}
    </div>
    @livewireScripts
@endsection