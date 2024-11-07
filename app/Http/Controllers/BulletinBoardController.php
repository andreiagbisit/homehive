<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulletinBoardCategory;
use App\Models\BulletinBoardEntry; // Assuming this model handles entries
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\BulletinBoardNotification;


class BulletinBoardController extends Controller
{

    
    public function index()
    {
        // Fetch entries and map them
        $entries = BulletinBoardEntry::with(['category', 'user'])->get()->map(function ($entry) {
            return [
                'title' => $entry->title,
                'start' => $entry->post_date,
                'className' => 'event-' . strtolower($entry->category->name ?? 'Uncategorized'), // Use 'Uncategorized' if category is missing
                'extendedProps' => [
                    'category' => $entry->category ? $entry->category->name : 'Uncategorized',  // Fallback to 'Uncategorized' if no category
                    'dateAndTimePublished' => $entry->created_at->format('m-d-Y H:i A'),
                    'author' => $entry->user ? $entry->user->fname . ' ' . $entry->user->mname . ' ' . $entry->user->lname : 'Unknown',  // Concatenate author name
                    'description' => $entry->description,
                    'entryId' => $entry->id, // Ensure the entryId is passed here
                ]
            ];
        })->toArray();  // Convert to array        

           // Check if $entries and $categories are populated
        //dd($entries, $categories);
    
        // Pass categories and prepared entries to the view
        $categories = BulletinBoardCategory::all();
        return view('bulletin.board.entries.admin', compact('categories', 'entries'));
    }
    

    // Show the add entry form
    public function create()
    {
        // Get all categories to display in the form
        $categories = BulletinBoardCategory::all();

        return view('bulletin-board.add-entry', compact('categories')); // Assuming modal-bulletin-add is in 'add-entry'
    }

    // Store the new entry
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'post_date' => 'required|date',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:bulletin_board_category,id',
            'description' => 'required|string',
        ]);

        // Create a new bulletin board entry
        $bulletinEntry = BulletinBoardEntry::create([
            'post_date' => $request->input('post_date'),
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
            'user_id' => Auth::id(),  // Set the user_id of the logged-in user
        ]);

         // Send email notification to all users
        $users = User::all(); // Optionally filter active users or specific user types
        foreach ($users as $user) {
        Mail::to($user->email)->queue(new BulletinBoardNotification($bulletinEntry));
        }

        return redirect()->route('bulletin.board.admin')->with('success', 'Bulletin board entry added successfully. Notifications successfully sent.');
    }

    public function edit($id)
    {
        $entry = BulletinBoardEntry::findOrFail($id); // Find the entry by ID
        $categories = BulletinBoardCategory::all(); // Fetch all categories

        return view('bulletin-board.edit-entry', compact('entry', 'categories')); // Pass data to view
    }

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'post_date' => 'required|date',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:bulletin_board_category,id',
            'description' => 'required|string',
        ]);

        // Find the bulletin entry by ID
        $entry = BulletinBoardEntry::findOrFail($id);

        // Update the entry fields
        $entry->update([
            'post_date' => $request->input('post_date'),
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
        ]);

        // Redirect back with success message
        return redirect()->route('bulletin.board.admin')->with('success', 'Bulletin board entry updated successfully.');
    }

    public function destroy($id)
    {
        // Soft delete the bulletin board entry
        $bulletinEntry = BulletinBoardEntry::findOrFail($id);
        $bulletinEntry->delete();
    
        return redirect()->route('bulletin.board.admin')->with('success', 'EBulletin board entry removed successfully.');
    }
    

}
