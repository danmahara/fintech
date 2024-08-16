<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donation;

use Auth;
class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }

    public function countTotal()
    {
        $totalUsers = User::count();

        // Get the total count of donations
        $totalDonations = Donation::count();

        $totalCampaign = Campaign::count();

        // // Pass both counts to the view
        return view('admin.index', compact('totalUsers', 'totalDonations', 'totalCampaign'));
        // return view('admin.index');
    
        
    }

    public function userList()
    {
        // Fetch all users
        $users = User::all();

        // Pass users to the view
        return view('admin.userList', compact('users'));
    }



    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/'); // Redirect to the home page or any other page
    }

}
