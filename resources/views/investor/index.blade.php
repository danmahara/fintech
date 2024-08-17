@extends('investor.investorLayout')

@section('header')
    Investor Dashboard
@endsection

@section('main')
<div class="cards">
    <div class="card">
        <h2>Total Investments</h2>
        <p>{{ $totalDonations }}</p>
    </div>
  
</div>
@endsection
