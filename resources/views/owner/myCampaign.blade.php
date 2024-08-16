@extends('owner.ownerLayouts')

@section('title', 'Dashboard')

@section('header', 'Project Owner Dashboard')

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
                <!-- <th>Created At</th>  -->
            </tr>
        </thead>
        <tbody>
            @foreach ($myCampaigns as $campaign)
                <tr>
                    <td>{{ $campaign->title }}</td>
                    <td>{{ $campaign->description }}</td>
                    <td>{{ $campaign->goal_amount }}</td>
                    <td>
                        <button class="btn-donate" data-campaign-id="{{ $campaign->id }}">Donate</button>
                    </td>
                    <!-- <td>{{ $campaign->created_at->format('Y-m-d') }}</td> -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Donation Modal -->
<div id="donationModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Donate to Campaign</h2>
        <form id="donationForm" action="" method="POST">
            @csrf
            <input type="hidden" id="campaign_id" name="campaign_id">
            <div class="form-group">
                <label for="amount">Enter Amount:</label>
                <input type="number" id="amount" name="amount" class="form-control" required>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>
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

    .table th,
    .table td {
        padding: 12px;
        border: 1px solid #bdc3c7;
        text-align: left;
        color: #2c3e50;
    }

    .table th {
        background-color: #34495e;
        color: #fff;
    }

    /* Modal Styles */
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1; 
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; 
        padding: 20px;
        border: 1px solid #888;
        width: 80%; 
        max-width: 500px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        color: #2c3e50;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .form-group input {
        padding: 8px;
        font-size: 0.9em;
        border: 1px solid #bdc3c7;
        border-radius: 4px;
        background-color: #ecf0f1;
        color: #2c3e50;
    }

    .btn {
        background-color: #2980b9;
        color: #fff;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.9em;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: #3498db;
    }
</style>
<script>
    // Get the modal
    var modal = document.getElementById("donationModal");

    // Get the button that opens the modal
    var btns = document.querySelectorAll(".btn-donate");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on a button, open the modal and set the action URL
    btns.forEach(function(btn) {
        btn.onclick = function() {
            var campaignId = this.getAttribute("data-campaign-id");
            document.getElementById("campaign_id").value = campaignId;
            document.getElementById("donationForm").action = `/path/to/donation/endpoint/${campaignId}`;
            modal.style.display = "block";
        }
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Client-side validation
    document.getElementById("donationForm").onsubmit = function(e) {
        var amount = parseFloat(document.getElementById("amount").value);
        var campaignGoal = parseFloat(document.getElementById("campaign_id").getAttribute("data-goal-amount"));

        if (amount < 100) {
            alert("The amount must be at least 100.");
            e.preventDefault(); // Prevent form submission
        } else if (amount > campaignGoal) {
            alert("The amount cannot exceed the goal amount.");
            e.preventDefault(); // Prevent form submission
        }
    }
</script>

@endsection
