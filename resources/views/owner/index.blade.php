@extends('owner.ownerLayouts')

@section('title', 'Dashboard')

@section('header', 'Project Owner Dashboard')

@section('main')

<div class="card">
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


    <form action="{{ route('campaignStore') }}" method="POST">
        @csrf
        <div class="form-group">
            Category
            <select name="category_id" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Campaign Title</label>
            <input type="text" id="title" name="title" class="form-control small-input" required>
        </div>
        <div class="form-group">
            <label for="description">Campaign Description</label>
            <textarea id="description" name="description" class="form-control small-input" required></textarea>
        </div>
        <div class="form-group">
            <label for="goal_amount">Goal Amount</label>
            <input type="number" id="goal_amount" name="goal_amount" class="form-control small-input" required>
        </div>
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <button type="submit" class="btn">Create Campaign</button>
    </form>
</div>



<style>
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
    }

    .form-group textarea {
        resize: vertical;
        height: 100px;
    }

    .small-input {
        max-width: 400px;
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

@endsection