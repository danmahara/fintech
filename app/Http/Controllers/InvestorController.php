<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Campaign;
use Auth;
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

//     public function investmentList()
// {
//     $user = auth()->user();

//     // Debug the user role
//     // dd($user->role); 

//     // Check if the authenticated user exists and has the role of 'investor'
//     if ($user && $user->role === 'investor') {
//         // Fetch investments associated with the user
//         $investments = Donation::where('user_id', $user->id)
//             ->orderBy('created_at', 'desc')
//             ->get();

//         return view('investor.investmentList', compact('investments'));
//     }

//     // If the user is not an investor or not authenticated, redirect or handle appropriately
//     return redirect()->route('index')->with('error', 'Access denied. Only investors can view the investment history.');
// }


    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user && $user->role === 'investor') {
            // Delete all tokens for the admin user
            $user->tokens->each(function ($token) {
                $token->delete();
            });

            // Redirect to the index page after logging out
            return redirect()->route('index');
        }

        // Return a JSON response if the user is not an admin
        return response()->json(['message' => 'Only admins can perform this action', 'role' => $user ? $user->role : 'None'], 403);
    }


}
