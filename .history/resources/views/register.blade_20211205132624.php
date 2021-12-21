@if ($errors->any())
    {{-- @dd($errors); --}}
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>{{ $title }}</title>
</head>
<body class="bg-light ">
    <div class="container">
        <div class="row align-items-center" style="height: 100vh;">
            <div class="col-md-6 offset-md-3 bg-white shadow p-3 rounded">
                <h4 class="text-center">Register</h4><hr>
                <form action="/register" method="POST" class="form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" id="username">
                        @error('username')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                            @else
                            <div class="form-text">
                                Alamat email harus merupakan alamat dengan domain asli!
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password">
                            @error('password')
                            <div class="invalid-feedback form-text">
                                {{ $message }}
                            </div>
                            @else
                            <div class="form-text">
                                <ul>
                                    <li>Memiliki minimal 8 karakter</li>
                                    <li>Memiliki maximal 30 karakter</li>
                                </ul>
                            </div>
                            @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="class">Class</label>
                                <select class="form-select" id="class"  name="class">
                                    <option selected disabled value="">Choose...</option>
                                    @foreach ($classes as $c)
                                        <option value="{{ $c->id }}">{{ $c->class }}</option>
                                    @endforeach
                                </select>
                                @error('class')
                                <div class="valid-feedback form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="department">Department</label>
                                <select class="form-select @error('department') is-invalid @enderror" id="department"  name="department">
                                    <option selected disabled value="">Choose...</option>
                                    @foreach ($departments as $d)
                                        <option value="{{ $d->id }}">{{ $d->department }}</option>
                                    @endforeach
                                </select>
                                @error('department')
                                <div class="valid-feedback form-text">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary w-100">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>