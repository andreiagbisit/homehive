<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SubdivisionRole;
use Illuminate\Http\Request;

class AccountManagementController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();
        return view('acc-mgmt/super-admin', compact('users'));
    }

    public function manageRoles()
    {
        $users = User::with('subdivisionRole')->get(); // Load users with their roles
        return view('acc-mgmt.manage-roles', compact('users')); // Pass 'users' to the view
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

    public function editRole($id)
    {
        // Find the user by ID, or return a 404 if not found
        $user = User::findOrFail($id);
    
        // Pass the user to the view
        return view('acc-mgmt.edit-entry-role', compact('user'));
    }    

        public function updateEntryRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validate the role name input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Check if the user has a subdivision role or create a new one
        $role = $user->subdivisionRole ?? new SubdivisionRole();
        $role->name = $request->input('name');
        $role->save();

        // Associate the role with the user
        $user->subdivision_role_id = $role->id;
        $user->save();

        return redirect()->route('manage.roles')->with('success', 'Role updated successfully.');
    }



}
