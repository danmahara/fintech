<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
class InvestorController extends Controller
{
    //

    public function index()
    {
        return view('investor.index');
    }


    public function countTotal()
    {
        $userId = auth()->id(); // Get the ID of the authenticated user

        // Get the total count of donations for the authenticated user
        $totalDonations = Donation::where('user_id', $userId)->count();

        // Get the total count of campaigns for the authenticated user
        $totalCampaign = Campaign::where('user_id', $userId)->count();

        // Pass both counts to the view
        return view('investor.index', compact('totalDonations', 'totalCampaign'));
    }


}
