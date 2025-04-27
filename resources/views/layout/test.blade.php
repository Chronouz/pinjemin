<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/HomeStyle.css') }}">

    <title>BacaLagi</title>
</head>

<body>
    <div class="nav">

        <li>
            <div class="logo">
                <a href="{{ url('/home') }}">BacaLagi</a>
        </li>

        <li>
            <div class="bodyparent">
                <ul>
                    <li><a class="active" href="{{ url('/home') }}">Home</a></li>
                    <li><a href="{{ url('/kategori') }}">Kategori</a></li>
                    <li><a href="{{ url('/bantuan') }}">Bantuan</a></li>
                </ul>
            </div>
        </li>

        <li>
            <div class="button">
                <div class="LoginBtn">
                    <a href="{{ url('/login') }}">Login</a>
                </div>
                <div class="RegisterBtn">
                    <a href="{{ url('/register') }}">Sign-In</a>
                </div>
        </li>


    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
