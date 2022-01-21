<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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