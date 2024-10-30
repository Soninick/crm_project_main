<?php

namespace App\Http\Controllers;

use App\Models\User; // Import User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Display a listing of all users
    public function index()
    {
        // Get all users from the database
        $users = User::all();
        
        // Return the admin dashboard view with the list of users
        return view('admin.index', compact('users'));
    }

    // Display the form for editing a specific user
    public function edit($id)
    {
        // Find the user by their ID
        $user = User::findOrFail($id);
        
        // Return the edit view with the user details
        return view('admin.edit', compact('user'));
    }

    // Handle the update request for a specific user
    public function update(Request $request, $id)
    {
        // Find the user by their ID
        $user = User::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'content_type' => ['required', 'string'],
        ]);

        // Update the user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->content_type = $request->content_type;
        $user->save(); // Save the updated user details

        // Redirect back to the admin dashboard with a success message
        return redirect()->route('admin.dashboard')->with('success', 'User details have been updated.');
    }
}
