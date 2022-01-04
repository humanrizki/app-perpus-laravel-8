{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $details['heading'] }}</title>
</head>
<body class="bg-gray-300 flex justify-center items-center h-screen w-screen">
    <div class="flex  w-4/5 h-4/5 content-center flex-col justify-center items-center bg-white p-3">
        <h1 class="font-bold text-3xl">{{ $details['title'] }}</h1>
        <p>{{ $details['body'] }}</p>
        <a href="" class="p-2 rounded bg-sky-400">Makan bang?</a>
    </div>
</body>
</html> --}}
@component('mail::message')
    # {{ $details['title'] }}
    {{ $details['body'] }}
@component('mail::button',['url'=>$details['link'], 'color'=>'error'])
    Lihat pesanan!
@endcomponent
    Thanks,<br>
    Library CN
@endcomponent