<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SubdivisionRole;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'uname' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('users', 'uname')->ignore($user->id)->whereNull('deleted_at')
            ],
            'email' => [
                'required', 
                'string', 
                'email', 
                'max:255', 
                Rule::unique('users', 'email')->ignore($user->id)->whereNull('deleted_at')
            ],
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'bdate' => 'required|date',
            'contact_no' => 'required|string|max:20',
            'street' => 'required|string|max:255',
            'house_blk_no' => 'required|integer',
            'house_lot_no' => 'required|integer',
        ], [
            'uname.required' => 'The username field is required.',  // Custom message for required uname
            'uname.unique' => 'This username has already been taken.', // Custom message for unique uname
            'email.required' => 'The email field is required.', // Custom message for required email
            'email.unique' => 'This email has already been taken.',   // Custom message for unique email
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

        // Determine the current user's role
        $currentUser = auth()->user(); // Get the logged-in user

        if ($currentUser->account_type_id == 1) {
            // Redirect to superadmin account management
            return redirect()->route('account.management.superadmin')->with('success', 'User deleted successfully.');
        } elseif ($currentUser->account_type_id == 2) {
            // Redirect to admin account management
            return redirect()->route('account.management.admin')->with('success', 'User deleted successfully.');
        }

        // Fallback in case no valid role is found (optional)
        return redirect()->route('login')->with('error', 'Unauthorized access.');
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

        // Update the user's account type
        $user->account_type_id = $request->input('account_type_id');
        $user->subdivision_role_id = $role->id;
        $user->save();

        // Redirect with a success message
        return redirect()->route('manage.roles')->with('success', 'Role and privileges updated successfully.');
    }


}
