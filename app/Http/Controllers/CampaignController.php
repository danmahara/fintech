<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Validator;

class CampaignController extends Controller
{
    public function index()
    {
        return Campaign::where('status', 'active')->get();
    }

    public function show($id)
    {
        return Campaign::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'campaign_id' => 'required|exists:campaigns,id',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Proceed with creating the expense if validation passes
        $campaign = Campaign::create($request->all());
        return response()->json($campaign, 201);
    }

    public function update(Request $request, $id)
    {
        // Update existing campaign
    }

    public function destroy($id)
    {
        // Delete campaign
    }
}
