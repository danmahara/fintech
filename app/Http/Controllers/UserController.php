<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Laravel\Passport\Token;

class UserController extends Controller
{


    public function registerForm()
    {
        return view('register');
    }

    public function index()
    {

    }

    public function register(Request $request)
    {
        // Define validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Confirm password matches password_confirmation
            'role' => 'required|in:project_owner,investor,admin', // Validate role
        ]);


        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Proceed with storing the user if validation passes
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return response()->json(['success' => true, 'message' => 'Registered successfully', $user, 201]);
    }

    public function login(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            $user = Auth::user();

            // Generate a personal access token
            $token = $user->createToken('Personal Access Token')->accessToken;

            // Determine dashboard URL based on user role
            $dashboardUrl = $this->getDashboardUrl($user->role);

            return response()->json([
                'token' => $token,
                'user' => $user,
                'dashboard_url' => $dashboardUrl
            ], 200);
        } else {
            // Authentication failed
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }



    private function getDashboardUrl($role)
    {
        switch ($role) {
            case 'project_owner':
                return url('/dashboard/project-owner'); // URL for project owner dashboard
            case 'investor':
                return url('/dashboard/investor'); // URL for investor dashboard
            case 'admin':
                return url('/dashboard/admin'); // URL for admin dashboard
            default:
                return url('/'); // Default URL if role is not recognized
        }
    }



    public function logout(Request $request)
    {
        $user = Auth::user();
    
        if ($user) {
            $user->tokens->each(function ($token) {
                $token->delete();
            });
    
            return response()->json(['message' => 'Logged out successfully'], 200);
        }
    
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    


    public function me()
    {
        return auth()->user();
    }
}
