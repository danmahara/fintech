<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Laravel\Passport\Token;

class UserController extends Controller
{


    public function signupForm()
    {
        return view('signup');
    }

    public function index()
    {
        return view('index');
    }
    public function loginForm()
    {
        return view('login');
    }


    public function register(Request $request)
    {
        // Validate the input
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:6|confirmed',
        //     'role' => 'required|string|in:admin,project_owner,investor',

        $validator = Validator::make($request->all(), [
            'role' => 'required|string',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        User::create([
            'role' => $request->input('role'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')), // Hash the password
        ]);
    
        // Redirect or return a response
        return redirect()->route('loginForm')->with('success', 'Registration successful. Please log in.');
    }


        // Create the user
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'role' => $request->role, // Ensure role is correctly assigned
        // ]);

        // return redirect()->route('loginForm');
        // return response()->json(['success' => true, 'message' => 'Registered successfully', $user, 201]);
    // }

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
            $user = Auth::user();
            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role === 'project_owner') {
                return redirect()->route('owner.index'); // Adjust route as necessary
            } elseif ($user->role === 'investor') {
                return redirect()->route('investor.index'); // Adjust route as necessary
            }
        }

        return redirect()->back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);

    }



    // private function getDashboardUrl($role)
    // {
    //     switch ($role) {
    //         case 'project_owner':
    //             return url('/dashboard/project-owner'); // URL for project owner dashboard
    //         case 'investor':
    //             return url('/dashboard/investor'); // URL for investor dashboard
    //         case 'admin':
    //             return url('/dashboard/admin'); // URL for admin dashboard
    //         default:
    //             return url('/'); // Default URL if role is not recognized
    //     }
    // }



    public function logout()
    {
        $user = Auth::user();

        if ($user) {
            // Check if the user has the 'investor' role
            if ($user->role === 'investor') {
                // Delete the investor user's tokens
                $user->tokens->each(function ($token) {
                    $token->delete();
                });

                // Redirect to the index route after logout
                return redirect()->route('index')->with('success', 'Investor logged out successfully');
            } else {
                // If the user is not an investor, return a 403 error with user details for debugging
                return response()->json([
                    'message' => 'Only investors can perform this action',
                    'role' => $user->role
                ], 403);
            }
        }

        // If the user is not authenticated, return a 401 error
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Check if the authenticated user has the right to delete this user
        if (Auth::id() !== $user->id && !Auth::user()->isAdmin()) {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        // Delete the user
        $user->delete();

        return response()->json(['message' => 'User deleted successfully.'], 200);
    }



    public function me()
    {
        return auth()->user();
    }
}
