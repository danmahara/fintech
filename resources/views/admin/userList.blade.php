@extends('admin.adminLayout')
@section('main')

<div class="ml-64 p-5"> <!-- content -->
    <h1 class="text-2xl font-bold mb-5">User List</h1>

    <div class="bg-white p-5 rounded-lg shadow-lg mt-5"> <!-- card -->
        <table class="w-[1200px] border-collapse mt-5"> <!-- table -->
            <thead>
                <tr>
                    <th class="border border-gray-300 p-3 bg-blue-600 text-white">ID</th>
                    <th class="border border-gray-300 p-3 bg-blue-600 text-white">Name</th>
                    <th class="border border-gray-300 p-3 bg-blue-600 text-white">Email</th>
                    <th class="border border-gray-300 p-3 bg-blue-600 text-white">Role</th>
                    <th class="border border-gray-300 p-3 bg-blue-600 text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="odd:bg-white even:bg-gray-100"> <!-- alternating row colors -->
                        <td class="border border-gray-300 p-3">{{ $user->id }}</td>
                        <td class="border border-gray-300 p-3">{{ $user->name }}</td>
                        <td class="border border-gray-300 p-3">{{ $user->email }}</td>
                        <td class="border border-gray-300 p-3">{{ ucfirst($user->role) }}</td>
                        <td class="border border-gray-300 p-3">
                            <a href="#" class="text-blue-600 hover:text-blue-800">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
@endsection
