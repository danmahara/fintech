<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use App\Models\Campaign;
class DonationController extends Controller
{


    public function storeDonation(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric|min:100',
            'campaign_id' => 'required|exists:campaigns,id',
        ]);

        // Retrieve the campaign
        $campaign = Campaign::findOrFail($request->campaign_id);

        // Check if the raised amount has reached the goal
        if ($campaign->raised_amount >= $campaign->goal_amount) {
            return redirect()->route('investor.index')->with('error', 'This campaign has already reached its goal. No further donations can be made.');
        }

        // Calculate the new raised amount
        $newRaisedAmount = $campaign->raised_amount + $request->amount;

        // Ensure the new raised amount does not exceed the goal amount
        if ($newRaisedAmount > $campaign->goal_amount) {
            return redirect()->route('investor.index')->with('error', 'Donation exceeds the campaign goal amount.');
        }

        // Update the campaign's raised amount
        $campaign->raised_amount = $newRaisedAmount;
        $campaign->save();

        // Create a new donation record
        $donation = new Donation();
        $donation->amount = $request->amount;
        $donation->campaign_id = $request->campaign_id;
        $donation->user_id = $request->user_id;
        $donation->save();

        // Redirect with success message
        return redirect()->route('investor.index')->with('success', 'Donation successfully made.');
    }



    public function index()
    {
        // List donations (optional)
    }
    public function investmentList()
    {
        $user = auth()->user();

        dd($user->role);
        // dd($user->role);

        // Check if the authenticated user exists and has the role of 'investor'
        if ($user && $user->role === 'investor') {
            //     // Fetch investments associated with the user
            $investments = Donation::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('investor.investmentList', compact('investments'));

        }

        // If the user is not an investor or not authenticated, redirect or handle appropriately
        return redirect()->route('investor.investmentList')->with('error', 'Access denied. Only investors can view the investment history.');
    }


    public function show($id)
    {
        // Show donation details (optional)
    }
}
