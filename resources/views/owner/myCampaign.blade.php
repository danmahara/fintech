@extends('owner.ownerLayouts')

@section('title', 'Dashboard')

@section('header', 'Project Owner Dashboard')

@section('main')
<div class="card">
    <h2>My Campaigns</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Goal Amount</th>
                <th>Raised Amount</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myCampaigns as $campaign)
                <tr>
                    <td>{{ $campaign->title }}</td>
                    <td>{{ $campaign->description }}</td>
                    <td>{{ $campaign->goal_amount }}</td>
                    <td>{{$campaign->raised_amount}}</td>
                    <td>{{$campaign->status}}</td>
                    <td>
                        <button class="btn-edit" data-campaign-id="{{ $campaign->id }}" data-title="{{ $campaign->title }}"
                            data-description="{{ $campaign->description }}" data-goal-amount="{{ $campaign->goal_amount }}">
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Edit Modal -->
<div id="editModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Edit Campaign</h2>
        <form id="editForm" method="POST" action="">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="editTitle">Title</label>
                <input type="text" id="editTitle" name="title" required>
            </div>
            <div class="form-group">
                <label for="editDescription">Description</label>
                <textarea id="editDescription" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="editGoalAmount">Goal Amount</label>
                <input type="number" id="editGoalAmount" name="goal_amount" min="100" required>
            </div>
            <button type="submit" class="btn">Update</button>
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
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
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

    .form-group input,
    .form-group textarea {
        padding: 8px;
        font-size: 0.9em;
        border: 1px solid #bdc3c7;
        border-radius: 4px;
        background-color: #ecf0f1;
        color: #2c3e50;
        width: 100%;
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
    var modal = document.getElementById("editModal");

    // Get the button that opens the modal
    var btns = document.querySelectorAll(".btn-edit");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on a button, open the modal and set the action URL
    btns.forEach(function (btn) {
        btn.onclick = function () {
            var campaignId = this.getAttribute("data-campaign-id");
            var formAction = `{{ route('owner.campaignUpdate', ':id') }}`.replace(':id', campaignId);
            document.getElementById("editForm").action = formAction;

            // Set existing values in the form fields
            document.getElementById("editTitle").value = this.getAttribute("data-title");
            document.getElementById("editDescription").value = this.getAttribute("data-description");
            document.getElementById("editGoalAmount").value = this.getAttribute("data-goal-amount");

            modal.style.display = "block";
        }
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>

@endsection