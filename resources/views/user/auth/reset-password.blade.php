<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="img/favicon/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="img/favicon/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="img/favicon/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="img/favicon/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="img/favicon/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="img/favicon/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="img/favicon/mstile-310x310.png" />
</head>
<body>
    <div class="w-full bg-white ">
        <h1 class="text-2xl w-full font-medium text-blue-500 shadow p-3 fixed">Forgot password</h1>
        <form action="" method="POST" class=" p-3 w-full  flex justify-center h-screen items-center">
            
            @csrf
            <div class="border w-11/12 md:w-2/5 lg:w-2/5 xl:2/5 sm:w-2/5 rounded p-3 shadow-lg">
               
                <p class="text-center font-medium mb-2">Masukkan password baru</p><hr>
                <div class="w-full mt-2">
                    <label for="" class="block font-medium ml-2">Password</label>
                    <input type="password" name="password" class="block p-2 w-full border border-2 rounded @error('password') border-red-500 border-2 @else border-gray-300 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full mt-2">
                    <label for="" class="block font-medium ml-2">Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="block p-2 w-full border border-2 rounded @error('password_confirmation') border-red-500 border-2 @else border-gray-300 @enderror">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm font-medium">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full mt-2">
                    <button type="submit" class="p-2 w-full text-white font-medium rounded bg-green-500 hover:bg-green-600 hover:shadow">Reset</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/@themesberg/flowbite@1.3.0/dist/flowbite.bundle.js"></script>
</body>
</html>