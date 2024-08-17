@extends('admin.adminLayout')
@section('main')

<div class="ml-64 p-5 w-[calc(100%-250px)]"> <!-- Same as margin-left: 250px; padding: 20px; -->
    <h1 class="text-2xl font-bold mb-5">Campaign List</h1>


    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
