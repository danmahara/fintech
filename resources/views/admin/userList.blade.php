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
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td>
                            <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background: none; cursor: pointer; color: red;">
                                    <i class="fas fa-trash-alt"></i>Delete
                                </button>
                            </form>
                        </td>
                        <!-- <td>{{ $user->created_at->format('Y-m-d H:i:s') }}</td> -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>