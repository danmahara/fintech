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
            'campaign_id' => 'required|exists:campaigns,id', // Assuming you have a campaigns table
        ]);

        // dd($request->all());
        $campaign = Campaign::findOrFail($request->campaign_id);

        if (!$campaign) {
            return response()->jsons(['failed' => 'Campaing not found']);
        }

        // Create a new donation record
        $donation = new Donation();
        $donation->amount = $request->amount;
        $donation->campaign_id = $request->campaign_id;
        $donation->user_id = $request->user_id; // Associate the donation with the authenticated user
        $donation->save();

        // Optionally: Update campaign progress or handle additional logic

        // Redirect with success message
        // return response()->json(['success' => 'Donation successfully made.']);
        // return response()->json(['success' => 'Donation successfully made.']);
        return redirect()->route('investor.index')->with('success', 'Donation successfully made.');
    }


    public function index()
    {
        // List donations (optional)
    }
    public function investmentList()
    {
        $user = auth()->user();

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
