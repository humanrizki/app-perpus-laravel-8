<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <title>{{ $title }}</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/43727f9558.js" crossorigin="anonymous"></script>
    {{-- <style>
      *,body{
        margin: 0px;
        padding: 0px;
      }
    </style> --}}
    @if (request()->is('/'))
        <link rel="stylesheet" href="css/home.css">
    @endif
    {{-- <link rel="stylesheet" href="css/ul.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <livewire:styles/>
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    @yield('head')
  </head>
  <body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <livewire:scripts/>
  </body>
</html>