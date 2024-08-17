@extends('owner.ownerLayouts')

@section('title', 'Dashboard')

@section('header', 'Project Owner Dashboard')

@section('main')
<div class="container">
    <div class="card centered-card">
        <h2>Create a New Campaign</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form id="campaignForm" action="{{ route('campaignStore') }}" method="POST">
            @csrf
            <div class="form-group">
                Category
                <select name="category_id" id="category" class="form-control large-input">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Campaign Title</label>
                <input type="text" id="title" name="title" class="form-control large-input" required>
            </div>
            <div class="form-group">
                <label for="description">Campaign Description</label>
                <textarea id="description" name="description" class="form-control large-input" required></textarea>
            </div>
            <div class="form-group">
                <label for="goal_amount">Goal Amount</label>
                <input type="number" id="goal_amount" name="goal_amount" class="form-control large-input" required>
            </div>

            <!-- Additional Information for Startups -->
             <hr>
             <br>
            <div class="form-group">
                <label for="idea_details">Idea or Business Details (Optional)</label>
                <textarea id="idea_details" name="idea_details" class="form-control large-input"
                    placeholder="Describe your startup idea or any existing businesses you have (optional)."></textarea>
            </div>
            <div class="form-group">
                <label for="business_experience">Business Experience (Optional)</label>
                <input type="text" id="business_experience" name="business_experience" class="form-control large-input"
                    placeholder="Share any relevant business experience (optional).">
            </div>
            <!-- End of Additional Information -->

            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <button type="submit" class="btn">Create Campaign</button>
        </form>
    </div>
</div>

<style>
    *{
        margin: 0;
        padding: 0;
    }
    .container {
        margin-top: 150px;
        position: relative;
        top: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 100px);
        padding-top: 10px;
    }

    .centered-card {
        width: 100%;
        max-width: 600px;
        padding: 10px 30px;
        margin-bottom: 200px; /* Added margin at the bottom */
        /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); */
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
    .form-group textarea,
    .form-group select {
        padding: 10px;
        font-size: 1em;
        border: 1px solid #bdc3c7;
        border-radius: 4px;
        background-color: #ecf0f1;
        color: #2c3e50;
        width: 100%;
    }

    .form-group textarea {
        resize: vertical;
        height: 120px;
    }

    .btn {
        background-color: #2980b9;
        color: #fff;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .btn:hover {
        background-color: #3498db;
    }
</style>

<script>
    document.getElementById('goal_amount').addEventListener('input', function () {
        var value = parseInt(this.value);
        if (value < 0) {
            this.setCustomValidity('Please enter a positive amount.');
        } else {
            this.setCustomValidity('');
        }
    });
</script>
@endsection
