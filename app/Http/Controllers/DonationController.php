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

        // Find the campaign
        $campaign = Campaign::findOrFail($request->campaign_id);

        // Check if the amount exceeds the goal amount
        if ($request->amount > $campaign->goal_amount) {
            return back()->withErrors(['amount' => 'The amount cannot exceed the goal amount.']);
        }

        // Create a new donation record
        $donation = new Donation();
        $donation->amount = $request->amount;
        $donation->campaign_id = $request->campaign_id;
        $donation->user_id = auth()->id(); // Associate the donation with the authenticated user
        $donation->save();

        // Optionally: Update campaign progress or handle additional logic

        // Redirect with success message
        return redirect()->route('owner.index')->with('success', 'Donation successfully made.');
    }


    public function index()
    {
        // List donations (optional)
    }
    public function investmentList()
    {
        $user = auth()->user();

        // Check if the authenticated user exists and has the role of 'investor'
        if ($user && $user->role === 'investor') {
            // Fetch investments associated with the user
            $investments = Donation::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('investor.investmentList', compact('investments'));
        }

        // If the user is not an investor or not authenticated, redirect or handle appropriately
        return redirect()->route('index')->with('error', 'Access denied. Only investors can view the investment history.');
    }


    public function show($id)
    {
        // Show donation details (optional)
    }
}
