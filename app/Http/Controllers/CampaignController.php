<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Validator;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        return view('admin.campaignList', compact('campaigns'));
    }


    public function approvedCampaignList()
    {
        // Fetch campaigns where the 'approved' status is true
        $approvedCampaigns = Campaign::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->get();

        // Return a view with the approved campaigns data
        return view('investor.campaignList', compact('approvedCampaigns'));
    }

    public function updateCampaign(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric|min:100',
        ]);

        // Find the campaign by ID
        $campaign = Campaign::findOrFail($id);

        // Update the campaign details
        $campaign->title = $request->input('title');
        $campaign->description = $request->input('description');
        $campaign->goal_amount = $request->input('goal_amount');

        // Save the changes
        $campaign->save();

        // Redirect back with a success message
        return redirect()->route('owner.myCampaign')
            ->with('success', 'Campaign updated successfully!');
    }

    public function myCampaign()
    {
        // Retrieve campaigns where the authenticated user is the creator
        $userId = auth()->id();
        $myCampaigns = Campaign::where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get()
        ;

        // Return the view with the list of campaigns
        return view('owner.myCampaign', compact('myCampaigns'));
    }



    public function updateCampaignStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:under_review,pending,active,failed,completed'
        ]);

        $campaign = Campaign::findOrFail($id);
        $campaign->status = $request->input('status');

        if ($campaign->save()) {
            return redirect()->route('admin.campaignList');
            // return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update status.'], 500);
        }
    }





    // public function updateStatus(Request $request, $id)
    // {
    //     $campaign = Campaign::findOrFail($id);
    //     $campaign->status = $request->input('status');
    //     $campaign->save();

    //     return redirect()->route('admin.campaign')->with('success', 'Campaign status updated!');
    // }



    public function show($id)
    {
        return Campaign::findOrFail($id);
    }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'campaign_id' => 'required|exists:campaigns,id',
    //         'amount' => 'required|numeric',
    //         'description' => 'nullable|string',
    //         'date' => 'required|date',
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     // Proceed with creating the expense if validation passes
    //     $campaign = Campaign::create($request->all());
    //     return response()->json($campaign, 201);
    // }

    public function destroy($id)
    {
        // Delete campaign
    }
}
