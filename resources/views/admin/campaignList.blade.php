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
    <div class="container">
    <h2 class="text-center">Approved Campaigns</h2>

    @if ($approvedCampaigns->isEmpty())
        <p>No approved campaigns found.</p>
    @else
        <div class="row">
            @foreach ($approvedCampaigns as $campaign)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $campaign->title }}</h5>
                            <p class="card-text">{{ Str::limit($campaign->description, 100) }}</p>
                            <p><strong>Goal Amount:</strong> ${{ number_format($campaign->goal_amount, 2) }}</p>
                            <p><strong>End Date:</strong> {{ $campaign->end_date->format('M d, Y') }}</p>
                            <a href="{{ route('campaign.show', $campaign->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    function updateStatus(campaignId, newStatus) {
        // Create a new form element
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "{{ route('admin.updateCampaignStatus', '') }}/" + campaignId;

        // Add CSRF token input
        var csrfInput = document.createElement("input");
        csrfInput.type = "hidden";
        csrfInput.name = "_token";
        csrfInput.value = "{{ csrf_token() }}";
        form.appendChild(csrfInput);

        // Add method input (to mimic PUT method)
        var methodInput = document.createElement("input");
        methodInput.type = "hidden";
        methodInput.name = "_method";
        methodInput.value = "PUT";
        form.appendChild(methodInput);

        // Add the new status as an input
        var statusInput = document.createElement("input");
        statusInput.type = "hidden";
        statusInput.name = "status";
        statusInput.value = newStatus;
        form.appendChild(statusInput);

        // Append the form to the body and submit it
        document.body.appendChild(form);
        form.submit();
    }
</script>