<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulletinBoardCategory;
use App\Models\BulletinBoardEntry; // Assuming this model handles entries


class BulletinBoardController extends Controller
{

    public function index()
    {
        // Fetch entries and map them
        $entries = BulletinBoardEntry::with('category')->get()->map(function($entry) {
            return [
                'title' => $entry->title,
                'start' => $entry->post_date,
                'className' => 'event-' . strtolower($entry->category->name),
                'extendedProps' => [
                    'category' => $entry->category->name,
                    'dateAndTimePublished' => $entry->created_at->format('m-d-Y H:i A'),
                    'author' => $entry->author ?? 'Unknown',
                    'description' => $entry->description
                ]
            ];
        })->toArray();  // Convert to array        

           // Check if $entries and $categories are populated
        dd($entries, $categories);
    
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
        BulletinBoardEntry::create([
            'post_date' => $request->input('post_date'),
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('bulletin.board.admin')->with('success', 'Entry added successfully!');
    }
}
