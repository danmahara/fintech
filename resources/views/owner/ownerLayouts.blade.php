<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Owner Dashboard')</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            color: #ecf0f1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar a,
        .sidebar button {
            display: block;
            color: #ecf0f1;
            padding: 15px;
            text-decoration: none;
            font-size: 1.2em;
            border-bottom: 1px solid #34495e;
            transition: background-color 0.3s ease;
            background: none;
            border: none;
            text-align: left;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
            /* Ensures padding is included in the element's width */
        }

        .sidebar a.active,
        .sidebar button.active {
            background-color: #2980b9;
        }

        .sidebar a:hover,
        .sidebar button:hover {
            background-color: #3498db;
            /* Light blue color on hover */
        }


        .sidebar i {
            margin-right: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 40px;
            width: calc(100% - 250px);
            background-color: #ecf0f1;
            min-height: 100vh;
        }

        .navbar {
            background: #3498db;
            color: #fff;
            padding: 15px;
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h2 {
            color: #2c3e50;
            margin-bottom: 15px;
        }

        .card .stats {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .card .stats div {
            text-align: center;
        }

        .card .stats h3 {
            font-size: 1.2em;
            color: #2980b9;
        }

        .card .stats p {
            font-size: 1.5em;
            color: #2c3e50;
            margin: 10px 0 0 0;
        }

        .card p {
            color: #7f8c8d;
            font-size: 1em;
        }

        .logout-container {
            padding: 15px;
            border-top: 1px solid #34495e;
        }

        .sidebar button i {
            color: #ecf0f1;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div>
            <a href="{{ route('owner.index') }}" class="{{ request()->routeIs('owner.index') ? 'active' : '' }}"><i
                    class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="{{route('owner.myCampaign')}}"
                class="{{ request()->routeIs('owner.myCampaign') ? 'active' : '' }}"><i class="fas fa-campaign"></i> My
                Campaigns</a>
            <a href="{{route('owner.investerList', auth()->id())}}"
                class="{{ request()->routeIs('owner.investorList') ? 'active' : '' }}"><i class="fas fa-campaign"></i>
                Investors List</a>
            <form action="{{ route('owner.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>
        </div>
    </div>
    <div class="content">
        <div class="navbar">
            @yield('header')
        </div>
        @yield('main')
    </div>

</body>

</html>