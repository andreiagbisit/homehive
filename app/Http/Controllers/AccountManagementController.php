<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountManagementController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();
        return view('acc-mgmt/super-admin', compact('users'));
    }

    // Show the form for viewing the specified user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('acc-mgmt/view-entry-acc', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('acc-mgmt/edit-entry-acc', compact('user'));
    }

    // Update the specified user in the database
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        // Validate only if fields are provided
        $validatedData = $request->validate([
            'uname' => 'nullable|string|max:255',
            'fname' => 'nullable|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'nullable|string|max:255',
            'bdate' => 'nullable|date',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $id,
            'contact_no' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'house_blk_no' => 'nullable|integer',
            'house_lot_no' => 'nullable|integer',
        ]);
    
        // Update only the fields that have changed
        $user->update($validatedData);
    
        // Redirect back to the view page with success message
        return redirect()->route('acc.mgmt.view.entry', $user->id)
            ->with('success', 'User updated successfully.');
    }
    

    // Remove the specified user from the database
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // Redirect back to the account management page after deletion
        return redirect()->route('account.management')->with('success', 'User deleted successfully.');
    }

public function verify(User $user)
{
    // Toggle the 'is_verified' status (true or false)
    $user->is_verified = !$user->is_verified;
    $user->save(); // Save the updated status

    // Return a JSON response with the new status
    return response()->json([
        'success' => true,
        'is_verified' => $user->is_verified, // Pass the updated status to the client
    ]);
}

}
