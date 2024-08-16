<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .signup-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        .signup-container h1 {
            margin-top: 0;
            font-size: 2em;
            text-align: center;
            color: #3498db;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-size: 1.1em;
            color: #333;
        }

        select,
        input {
            padding: 10px;
            margin-top: 5px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            background: #fff;
        }

        .submit-button {
            margin-top: 20px;
            padding: 15px;
            background: #3498db;
            color: #fff;
            font-size: 1.1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-button:hover {
            background: #2980b9;
        }


        .signup-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 1.1em;
        }

        .signup-link a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <h1>Sign Up</h1>
        <form action="{{route("register")}}" method="post">
            @csrf
            <label for="role">Select Role:</label>
            <select id="role" name="role" required>
                <option value="admin">Admin</option>
                <option value="project_owner">Project Owner</option>
                <option value="investor">Investor</option>
            </select>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="password_confirmation" required>

            <button type="submit" class="submit-button">Sign Up</button>
        </form>
        <div class="signup-link">
            <a href="{{route('loginForm')}}">Login</a>
        </div>
    </div>
</body>

</html>