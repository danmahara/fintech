

@extends('owner.ownerLayout')

@section('title', 'Dashboard')

@section('header', 'Project Owner Dashboard')

@section('content')
    <div class="card">
        <h2>Project Overview</h2>
        <div class="stats">
            <div>
                <h3>Active Projects</h3>
                <p>8</p>
            </div>
            <div>
                <h3>Completed Projects</h3>
                <p>12</p>
            </div>
            <div>
                <h3>Pending Tasks</h3>
                <p>24</p>
            </div>
        </div>
    </div>

    <div class="card">
        <h2>Recent Activity</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia odio vitae vestibulum.</p>
    </div>
@endsection
