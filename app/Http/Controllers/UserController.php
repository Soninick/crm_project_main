<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Ensure the User model is imported
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    // Display the form for editing user details
    public function edit()
    {
        $user = Auth::user(); // Get the authenticated user

        // Ensure $user is an instance of User
        if (!$user) {
            return redirect()->route('home')->with('error', 'User not found.');
        }

        return view('user.edit', compact('user')); // Pass the user to the view
    }

    // Handle the update request
    public function update(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user
    
        // Log the user object for debugging
        Log::info('Authenticated User: ', [$user]);
    
        // Ensure $user is an instance of User
        if (!$user || !($user instanceof User)) {
            return redirect()->route('home')->with('error', 'User not found.');
        }
    
        // Validate the incoming request data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
        ]);
    
        // Update the user details
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Save the updated user details
        if ($user->save()) {
            return redirect()->route('home')->with('success', 'Your details have been updated.');
        } else {
            return redirect()->route('home')->with('error', 'Failed to update your details.');
        }
    }
    
}
