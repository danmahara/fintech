@extends('admin.adminLayout')
@section('main')

<style>
    /* admin.css or inline style */

    .main-content {
        margin-left: 250px;
        /* Same as sidebar width */
        padding: 20px;
        width: calc(100% - 250px);
        /* Adjust width to make space for the sidebar */
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
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #3498db;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    button {
        background: #3498db;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        margin: 0 5px;
    }

    button:hover {
        background: #2980b9;
    }

    form {
        display: inline;
    }
</style>
<div class="main-content">
    <h1>Campaign List</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($campaigns as $campaign)
                <tr>
                    <td>{{ $campaign->id }}</td>
                    <td>{{ $campaign->title }}</td>
                    <td>{{ $campaign->description }}</td>
                    <td>{{ ucfirst($campaign->status) }}</td>
                    <td>
                        <form action="{{ route('admin.campaigns.updateStatus', $campaign->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <button name="status" value="accepted">Accept</button>
                            <button name="status" value="rejected">Reject</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>