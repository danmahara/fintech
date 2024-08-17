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

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index');
    }


    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user && $user->role === 'admin') {
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
