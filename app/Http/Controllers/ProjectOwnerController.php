<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Auth;

class ProjectOwnerController extends Controller
{

    public function index()
    {
        return view('owner.index');
    }
    // Store the newly created campaign
    public function storeCampaign(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);

        $campaign = new Campaign();
        $campaign->title = $validated['title'];
        $campaign->description = $validated['description'];
        $campaign->goal_amount = $validated['goal_amount'];
        $campaign->user_id = $validated['user_id'];
        $campaign->save();

        return redirect()->route('owner.index')->with('success', 'Campaign created successfully!');
    }


    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/'); // Redirect to the home page or any other page
    }

}
