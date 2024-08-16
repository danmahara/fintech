<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Auth;

class ProjectOwnerController extends Controller
{
    public function index()
    {
        return view('investor.index');
    }


    // public function createCampaign()
    // {
    //     return view('owner.create-campaign');
    // }

    // Store the newly created campaign
    public function storeCampaign(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal' => 'required|numeric|min:0',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $campaign = new Campaign();
        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->goal = $request->goal;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;
        $campaign->status = 'pending'; // Default status
        $campaign->save();

        return redirect()->route('owner.campaign')->with('success', 'Campaign created successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/'); // Redirect to the home page or any other page
    }

}
