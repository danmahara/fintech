@extends('admin.adminLayout')
@section('main')
<style>
    /* Add your existing styles or new styles here */

    .content {
        margin-left: 270px;
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background: #3498db;
        color: white;
    }

    tr:nth-child(even) {
        background: #f2f2f2;
    }

    .card {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
</style>
<div class="content">
    <h1>User List</h1>
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                    <!-- <th>Created At</th> -->
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