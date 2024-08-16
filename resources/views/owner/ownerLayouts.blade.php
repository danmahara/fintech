<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Investor Dashboard')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
        }

        .sidebar a {
            display: block;
            color: #ecf0f1;
            padding: 15px;
            text-decoration: none;
            font-size: 1.2em;
            border-bottom: 1px solid #34495e;
        }

        .sidebar a:hover {
            background-color: #34495e;
        }

        .sidebar a.active {
            background-color: #2980b9;
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
    </style>
</head>

<body>

    <div class="sidebar">
        <a href="{{ route('investor.index') }}" class="@yield('dashboard_active')"><i class="fas fa-tachometer-alt"></i>
            Dashboard</a>
        {{--
        <a href="{{ route('investor.investments') }}" class="@yield('investments_active')"><i
                class="fas fa-hand-holding-usd"></i> My Investments</a>
        <a href="{{ route('investor.campaigns') }}" class="@yield('campaigns_active')"><i class="fas fa-campaign"></i>
            Ongoing Campaigns</a>
        <a href="{{ route('investor.notifications') }}" class="@yield('notifications_active')"><i
                class="fas fa-bell"></i> Notifications</a>
        <a href="{{ route('logout') }}" style="margin-top: auto;"><i class="fas fa-sign-out-alt"></i> Logout</a>
        --}}
    </div>

    <div class="content">
        <div class="navbar">
            @yield('navbar')
        </div>

        @yield('main')
    </div>

</body>

</html>