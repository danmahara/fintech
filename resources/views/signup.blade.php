<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-lg w-full">
        <h1 class="text-2xl text-center text-black mb-6">All User Sign Up</h1>
        <form action="{{route('register')}}" method="post" class="flex flex-col">
            @csrf
            <label for="role" class="text-lg text-gray-700 mt-4">Select Role:</label>
            <select id="role" name="role" class="p-2 mt-2 text-lg border border-gray-300 rounded-lg bg-white outline-green-100" required>
                <option class="cursor-bg-black" value="admin">Admin</option>
                <option value="project_owner">Project Owner</option>
                <option value="investor">Investor</option>
            </select>

            <label for="name" class="text-lg text-gray-700 mt-4">Name:</label>
            <input type="text" id="name" name="name" class="p-2 mt-2 text-lg border border-gray-300 rounded-lg outline-green-100" required>

            <label for="email" class="text-lg text-gray-700 mt-4">Email:</label>
            <input type="email" id="email" name="email" class="p-2 mt-2 text-lg border border-gray-300 rounded-lg outline-green-100" required>

            <label for="password" class="text-lg text-gray-700 mt-4">Password:</label>
            <input type="password" id="password" name="password" class="p-2 mt-2 text-lg border border-gray-300 rounded-lg outline-green-100" required>

            <label for="confirm-password" class="text-lg text-gray-700 mt-4">Confirm Password:</label>
            <input type="password" id="confirm-password" name="password_confirmation" class="p-2 mt-2 text-lg border border-gray-300 outline-green-100 rounded-lg" required>

            <button type="submit" class="mt-6 p-3 bg-green-400 text-white text-lg rounded-lg hover:bg-green-500">Sign Up</button>
        </form>
        <div class="text-center mt-6">
            <a href="{{route('loginForm')}}" class="text-green-400 font-bold hover:underline">Login</a>
        </div>
    </div>
</body>

</html>

