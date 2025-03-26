<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <div class="container">
   
        <div class="sidebar">
            <div class="logo">PINJEMIN</div>
            <ul>
                <li class="active">Home</li>
                <li>Users</li>
                <li>Catalog</li>
                <li>Transaction</li>
                <li>About us</li>
            </ul>
            <div class="bottom-links">
                <ul>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-button">
                                <img src="{{ asset('images/Logout.png') }}" alt="Log out Icon" class="icon">
                                Log out
                            </button>
                        </form>
                    </li>
                    <li>
                        <img src="{{ asset('images/Settings.png') }}" alt="Settings Icon" class="icon">
                        Settings
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-content">
            <div class="dashboard">
                <div class="top-cards">
                    <div class="card"></div>
                    <div class="card"></div>
                    <div class="card"></div>
                    <div class="card"></div>
                </div>
                <div class="main-chart">Chart</div>
                <div class="side-info">
                    <div class="recent-transactions">Recent transaction</div>
                    <div class="new-users">New user</div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
