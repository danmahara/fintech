<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use Auth;
use App\Models\Category;

class ProjectOwnerController extends Controller
{

    public function index()
    {
        return view('owner.index');
    }

    public function categoryList()
    {
        $categories = Category::all();
        return view('owner.index', compact('categories'));
    }

    // Store the newly created campaign
    public function storeCampaign(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'goal_amount' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id', // Ensure category_id exists in categories table
        ]);

        // Create a new campaign instance and assign the validated data
        $campaign = new Campaign();
        $campaign->title = $validated['title'];
        $campaign->description = $validated['description'];
        $campaign->goal_amount = $validated['goal_amount'];
        $campaign->user_id = $validated['user_id'];
        $campaign->category_id = $validated['category_id']; // Assign the category_id

        // Save the campaign and check if the operation was successful
        if ($campaign->save()) {
            return redirect()->route('owner.index')->with('success', 'Campaign created successfully!');
        } else {
            // In case of failure, return with a generic error message
            return redirect()->route('owner.index')->with('failed', 'Failed to create campaign.');
        }
    }



    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user && $user->role === 'project_owner') {
            $user->tokens->each(function ($token) {
                $token->delete();
            });
            return redirect()->route('index');
        }
        return response()->json(['message' => 'Only admin can perform this action'], 403);
    }



}
