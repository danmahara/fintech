<style>
    .content {
        margin-left: 250px;
        padding: 20px;
        width: calc(100% - 250px);
    }

    .content h1 {
        color: #2c3e50;
    }

    .content .cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .content .card {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 300px;
        text-align: center;
    }

    .content .card h2 {
        color: #2980b9;
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .card a {
        text-decoration: none;
        color: #2980b9;

    }

    .content .card p {
        color: #7f8c8d;
        font-size: 1em;
    }
</style>

@extends('admin.adminLayout')
@section('main')


<div class="content">
    <h1>Welcome to the Admin Dashboard</h1>
    <div class="cards">
        <div class="card">
            <h2>Total Users</h2>

            <p>{{ $totalUsers }}</p>


        </div>
        <div class="card">
            <h2>Total Donations</h2>
            <p>{{$totalDonations}}</p>
        </div>
        <div class="card">
            <h2><a href="">Total Campaign</a></h2>
            <p>
                {{$totalCampaign}}
            </p>
        </div>

    </div>
</div>
@endsection

<!-- Font Awesome Icons -->
</body>

</html>