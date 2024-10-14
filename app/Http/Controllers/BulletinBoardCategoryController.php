<?php

namespace App\Http\Controllers;

use App\Models\BulletinBoardCategory; // Import the model
use Illuminate\Http\Request;

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
    
    


}
