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
            <div class="col-md-6 offset-md-3">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') 'is-invalid' @enderror">
                        @error('name')
                            <div class="valid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') 'is-invalid' @enderror">
                        @error('username')
                            <div class="valid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') 'is-invalid' @enderror">
                        @error('email')
                            <div class="valid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') 'is-invalid' @enderror">
                        @error('password')
                            <div class="valid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Class</label>
                                <select class="form-select" id="validationCustom04" required name="class">
                                    <option selected disabled value="">Choose...</option>
                                    @foreach ($classes as $c)
                                        <option value="{{ $c->class }}">{{ $c->class }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Department</label>
                                <select class="form-select" id="validationCustom04" required name="department">
                                    <option selected disabled value="">Choose...</option>
                                    @foreach ($departments as $d)
                                        <option value="{{ $d->department }}">{{ $d->department }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>