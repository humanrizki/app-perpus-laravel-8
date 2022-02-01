<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __("makan") }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <livewire:styles/>
</head>
<body>

    <livewire:dashboard-chart/>
    <livewire:scripts />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    @livewireChartsScripts
</body>
</html>