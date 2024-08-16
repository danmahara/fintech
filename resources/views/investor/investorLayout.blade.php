<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Investor Dashboard')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            display: flex;
            flex-direction: column;
        }

        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 15px;
            text-decoration: none;
            font-size: 1.1em;
            border-bottom: 1px solid #34495e;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #34495e;
            color: #ecf0f1;
        }

        .sidebar a.active {
            background-color: #2980b9;
            color: #fff;
        }

        .sidebar i {
            margin-right: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .navbar {
            background: #3498db;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 1.2em;
        }

        .sidebar form {
            margin: auto 0 20px;
            padding: 0;
        }

        .sidebar button {
            width: 100%;
            background: none;
            border: none;
            color: #ecf0f1;
            font-size: 1.1em;
            cursor: pointer;
            padding: 15px;
            text-align: left;
        }

        .sidebar button:hover {
            background-color: #34495e;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <a href="{{ route('investor.index') }}" class="@yield('dashboard_active')"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="" class="@yield('campaigns_active')"><i class="fas fa-campaign"></i> Ongoing Campaigns</a>
        <a href="" class="@yield('notifications_active')"><i class="fas fa-bell"></i> Notifications</a>
        <a href="" class="@yield('investments_active')"><i class="fas fa-hand-holding-usd"></i> My Investments</a>
        <form action="{{ route('investor.logout') }}" method="POST">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <div class="content">
        @yield('main')
    </div>

</body>

</html>
