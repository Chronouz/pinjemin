<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login PINJEMIN</title>
    <link rel="stylesheet" href="{{ asset('boothstrap/css/bootstrap.css') }}">
</head>
<body>
    
    <div class = "text-center mt-5">
        <h2>Login PinjemIn</h2>
        <p>Silahkan login terlebih dahulu</p>

        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-start">
                        <form action="{{ route('route.submit') }}" method="post">
                            @csrf
                            <label>Username</label>
                            <input type="text" name="username" class="form-control mb-2">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control mb-2">
                            <button class="btn btn-primary">LOGIN</button>
                        </form>

                        @if(session('gagal'))
                        <p class="text-danger">{{ session('gagal') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>