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
        $category = BulletinBoardCategory::findOrFail($id);
        $category->delete();  // Soft delete the category

        return redirect()->route('bulletin.board.manage.categories.admin')
                        ->with('success', 'Category deleted successfully!');
    }

    public function adminView()
    {
        // Fetch categories for the legend
        $categories = BulletinBoardCategory::all();
    
        // Fetch bulletin board entries
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
        })->toArray(); // Convert to array
    
        // Pass both $categories and $entries to the view
        return view('bulletin-board.admin', compact('categories', 'entries'));
    }
    

}
