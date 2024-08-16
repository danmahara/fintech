<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-white">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
        <h1 class="text-2xl text-center text-black mb-6">All User Login</h1>
        <form method="post" class="flex flex-col">
            @csrf
            <label for="email" class="text-lg text-gray-700 mt-4">Email:</label>
            <input type="email" id="email" name="email" class="p-2 mt-2 text-lg border border-gray-300 rounded-lg outline-green-100" required>

            <label for="password" class="text-lg text-gray-700 mt-4">Password:</label>
            <input type="password" id="password" name="password" class="p-2 mt-2 text-lg border border-gray-300 rounded-lg outline-green-100" required>

            <button type="submit" class="mt-6 p-3 bg-green-400 text-white text-lg rounded-lg hover:bg-green-500 outline-green-100">Login</button>
        </form>
        <div class="text-center mt-6">
            <a href="{{route('signupForm')}}" class="text-green-400 font-bold hover:underline">Sign Up</a>
        </div>
    </div>
</body>
</html>
