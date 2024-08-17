<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Layout</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

        .sidebar form {
            margin: 0;
            padding: 0;
        }

        .sidebar button {
            background: none;
            border: none;
            color: #fff;
            font-size: 1.1em;
            cursor: pointer;
            display: block;
            width: 100%;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #34495e;
        }

        .sidebar button:hover {
            background-color: #34495e;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <a href="{{ route('admin.index') }}" class="{{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>
        <a href="{{ route('admin.users') }}" class="{{ request()->routeIs('admin.users') ? 'active' : '' }}">
            <i class="fas fa-users"></i> Users List
        </a>
        <a href="{{ route('admin.campaignList') }}" class="{{ request()->routeIs('admin.campaign') ? 'active' : '' }}">
            <i class="fas fa-campaign"></i> Campaign
        </a>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    @yield('main')

</body>

</html>
