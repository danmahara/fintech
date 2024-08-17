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
                        <div class="form-group">
                            <label for="status">Update Status:</label>
                            <select class="form-control" id="status-{{ $campaign->id }}" name="status"
                                onchange="updateStatus({{ $campaign->id }}, this.value)">
                                <option value="under review" {{ $campaign->status == 'under review' ? 'selected' : '' }}>Under review
                                </option>
                                <option value="pending" {{ $campaign->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="active" {{ $campaign->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="completed" {{ $campaign->status == 'completed' ? 'selected' : '' }}>Completed
                                </option>
                                <option value="failed" {{ $campaign->status == 'failed' ? 'selected' : '' }}>Failed
                                </option>
                            </select>
                        </div>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
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