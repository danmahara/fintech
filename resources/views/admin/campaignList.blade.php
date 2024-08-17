@extends('admin.adminLayout')
@section('main')

<div class="ml-64 p-5 w-[calc(100%-250px)]"> <!-- Same as margin-left: 250px; padding: 20px; -->
    <h1 class="text-2xl font-bold mb-5">Campaign List</h1>

    @if(session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

    <div class="container mx-auto">
        <h2 class="text-center text-xl font-semibold mb-6">Approved Campaigns</h2>

        @if ($approvedCampaigns->isEmpty())
            <p class="text-gray-600">No approved campaigns found.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($approvedCampaigns as $campaign)
                    <div class="bg-white p-4 rounded-lg shadow-lg">
                        <h5 class="text-lg font-semibold mb-2">{{ $campaign->title }}</h5>
                        <p class="text-gray-700">{{ Str::limit($campaign->description, 100) }}</p>
                        <p class="mt-2"><strong>Goal Amount:</strong> ${{ number_format($campaign->goal_amount, 2) }}</p>
                        <p><strong>End Date:</strong> {{ $campaign->end_date->format('M d, Y') }}</p>
                        <a href="{{ route('campaign.show', $campaign->id) }}" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">View Details</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
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
