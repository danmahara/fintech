@extends('owner.ownerLayouts')

@section('title', 'Dashboard')

@section('header', 'Project Owner Dashboard')

@section('main')
<div class="investment-history-container">
    <h2>Your Investment History</h2>

    @if ($donations->isEmpty())
        <p>You have not made any investments yet.</p>
    @else
        <div class="investment-table-wrapper">
            <table class="investment-table">
                <thead>
                    <tr>
                        <th>Investment Date</th>
                        <th>Campaign Title</th>
                        <th>Amount Invested</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->created_at->format('M d, Y') }}</td>
                            <td>{{ $donation->campaign->title }}</td>
                            <td>{{ number_format($donation->amount, 2) }}</td> <!-- Changed $investment to $donation -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>


<style>
    .investment-history-container {
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .investment-table-wrapper {
        overflow-x: auto;
    }

    .investment-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .investment-table th,
    .investment-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .investment-table th {
        background-color: #007bff;
        color: white;
    }

    .investment-table td {
        background-color: white;
    }

    .investment-table tr:hover {
        background-color: #f1f1f1;
    }

    .status-completed {
        color: #28a745;
        font-weight: bold;
    }

    .status-pending {
        color: #ffc107;
        font-weight: bold;
    }

    .status-canceled {
        color: #dc3545;
        font-weight: bold;
    }
</style>
@endsection