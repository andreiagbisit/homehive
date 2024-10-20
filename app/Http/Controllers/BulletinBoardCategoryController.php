<?php

namespace App\Http\Controllers;

use App\Models\BulletinBoardCategory; // Import the model
use Illuminate\Http\Request;
use App\Models\BulletinBoardEntry;


class BulletinBoardCategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string|size:7', // Ensure it's a valid HEX code
        ]);

        BulletinBoardCategory::create([
            'name' => $request->input('name'),
            'hex_code' => $request->input('hex_code'),
        ]);

        return redirect()->route('bulletin.board.manage.categories.admin')
                         ->with('success', 'Category added successfully!');
    }

        public function index()
    {
        // Fetch all categories from the database
        $categories = BulletinBoardCategory::all();

        // Return the view with the categories data
        return view('bulletin-board.manage-categories-admin', compact('categories'));
    }

        public function show($id)
    {
        // Fetch the category by its ID or fail if not found
        $category = BulletinBoardCategory::findOrFail($id);
    
        // Pass the category to the view
        return view('bulletin-board.view-category-admin', compact('category'));
    }
    
        public function edit($id)
    {
        // Fetch the category by its ID
        $category = BulletinBoardCategory::findOrFail($id);

        // Return the edit view with the category data
        return view('bulletin-board.edit-category-admin', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string|size:7', // Ensure it's a valid HEX code
        ]);

        // Find the category and update its details
        $category = BulletinBoardCategory::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
            'hex_code' => $request->input('hex_code'),
        ]);

        // Redirect back to the manage categories page with a success message
        return redirect()->route('bulletin.board.manage.categories.admin')
                        ->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        // Find the category to be deleted
        $category = BulletinBoardCategory::findOrFail($id);
    
        // Find or create the default "Uncategorized" category
        $defaultCategory = BulletinBoardCategory::firstOrCreate(['name' => 'Uncategorized'], ['hex_code' => '#000000']); // Set a default hex color if needed
    
        // Reassign all entries with the current category to the default "Uncategorized" category
        \App\Models\BulletinBoardEntry::where('category_id', $category->id)
            ->update(['category_id' => $defaultCategory->id]);
    
        // Proceed to delete the category (soft delete if you're using it)
        $category->delete();
    
        // Redirect back with a success message
        return redirect()->route('bulletin.board.manage.categories.admin')
                         ->with('success', 'Category deleted and entries reassigned to "Uncategorized".');
    }    

    public function adminView()
    {
        // Fetch categories for the legend
        $categories = BulletinBoardCategory::all();
    
        // Fetch bulletin board entries
        $entries = BulletinBoardEntry::with('category')->get()->map(function($entry) {
            return [
                'title' => $entry->title,
                'start' => $entry->post_date_for_calendar,
                'className' => 'event-' . strtolower($entry->category->name ?? 'Uncategorized'),
                'extendedProps' => [
                    'category' => $entry->category->name ?? 'Uncategorized',
                    'dateAndTimePublished' => $entry->created_at->format('m-d-Y H:i A'),
                    'author' => $entry->user ? $entry->user->fname . ' ' . $entry->user->lname : 'Unknown', // Fetch the user's full name
                    'description' => $entry->description,
                    'entryId' => $entry->id, // Make sure the entryId is passed here
                ]
            ];
        })->toArray(); // Convert to array
    
        // Return view for admin
        return view('bulletin-board.admin', compact('categories', 'entries'))->with('role', 'admin');
    }

    public function superAdminView()
    {
        // Fetch categories and entries as in adminView
        $categories = BulletinBoardCategory::all();
        $entries = BulletinBoardEntry::with('category')->get()->map(function($entry) {
            return [
                'title' => $entry->title,
                'start' => $entry->post_date_for_calendar,
                'className' => 'event-' . strtolower($entry->category->name ?? 'Uncategorized'),
                'extendedProps' => [
                    'category' => $entry->category->name ?? 'Uncategorized',
                    'dateAndTimePublished' => $entry->created_at->format('m-d-Y H:i A'),
                    'author' => $entry->user ? $entry->user->fname . ' ' . $entry->user->lname : 'Unknown', // Fetch the user's full name
                    'description' => $entry->description,
                    'entryId' => $entry->id, // Make sure the entryId is passed here
                ]
            ];
        })->toArray();

        // Return the same view for super admin but with 'superadmin' flag
        return view('bulletin-board.admin', compact('categories', 'entries'))->with('role', 'superadmin');
    }
    

}
