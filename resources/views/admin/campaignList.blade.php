@extends('admin.adminLayout')
@section('main')

<style>
    .content {
        margin-left: 250px; /* Same as sidebar width */
        padding: 20px;
        width: calc(100% - 250px);
    }

    h1 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    .alert {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
        border-radius: 4px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .alert .btn-close {
        background: none;
        border: none;
        font-size: 1.25em;
        color: #155724;
        cursor: pointer;
        position: absolute;
        top: 10px;
        right: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f4f4f4;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .form-group {
        margin: 0;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ced4da;
        border-radius: 4px;
        font-size: 1em;
    }

    .form-control:focus {
        border-color: #80bdff;
        outline: none;
    }
</style>

<div class="content">
    <h1>Campaign List</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" aria-label="Close"></button>
        </div>
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
                                <option value="under_review" {{ $campaign->status == 'under_review' ? 'selected' : '' }}>Under
                                    review
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
        var form = document.createElement("form");
        form.method = "POST";
        form.action = "{{ route('admin.updateCampaignStatus', '') }}/" + campaignId;

        var csrfInput = document.createElement("input");
        csrfInput.type = "hidden";
        csrfInput.name = "_token";
        csrfInput.value = "{{ csrf_token() }}";
        form.appendChild(csrfInput);

        var methodInput = document.createElement("input");
        methodInput.type = "hidden";
        methodInput.name = "_method";
        methodInput.value = "PUT";
        form.appendChild(methodInput);

        var statusInput = document.createElement("input");
        statusInput.type = "hidden";
        statusInput.name = "status";
        statusInput.value = newStatus;
        form.appendChild(statusInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>

@endsection
