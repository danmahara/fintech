@extends('investor.investorLayout')

@section('title', 'Investment History')

@section('header', 'Ongoing Campaign')

@section('main')
    <div class="card">
        <h2>Approved Campaigns</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Goal Amount</th>
                    <th>Action</th>
                    <!-- <th>End Date</th>
                    <th>Created At</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($approvedCampaigns as $campaign)
                    <tr>
                        <td>{{ $campaign->title }}</td>
                        <td>{{ $campaign->description }}</td>
                        <td>{{ $campaign->goal_amount }}</td>
                        <td>{{ $campaign->end_date }}</td>
                        <td>{{ $campaign->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <style>
        .card {
            margin: 20px;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            padding: 12px;
            border: 1px solid #bdc3c7;
            text-align: left;
            color: #2c3e50;
        }

        .table th {
            background-color: #34495e;
            color: #fff;
        }
    </style>
@endsection
