<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>User Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 offset-md-4" style="margin-top: 50px">
            <h4>User Register</h4><hr>
            <form action="{{ route('user.create') }}" method="post" autocomplete="off">
                @if (Session::get('Success'))
                    <div class="alert alert-success">
                        {{ Session::get('Success') }}
                    </div>
                @endif
                    @if (Session::get('Fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('Fail') }}
                        </div>
                    @endif
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter the Name">
                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Enter the Email">
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" value="{{ old('password') }}" placeholder="Enter the Password">
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="password">Confirm Password</label>
                    <input class="form-control" type="password" name="cpassword" value="{{ old('cpassword') }}" placeholder="Enter confirm Password">
                    <span class="text-danger">@error('cpassword'){{ $message }}@enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" style="margin-top: 40px" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
