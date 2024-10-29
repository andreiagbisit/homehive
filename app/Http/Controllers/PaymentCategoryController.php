<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentCategory;
use App\Models\User;
use App\Models\PaymentCollector;

class PaymentCategoryController extends Controller
{
    // Show the form to add a new category
    public function create()
    {
        return view('collection-mgmt.add-category-super-admin');
    }

    // Store the new category in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string', // Validation for hex color
        ]);

        PaymentCategory::create([
            'name' => $request->name,
            'hex_code' => $request->hex_code,
        ]);

        return redirect()->route('manage.fund.collection.categories.superadmin')
                         ->with('success', 'Category added successfully.');
    }
    public function index()
    {
        $categories = PaymentCategory::all();
        return view('collection-mgmt.manage-fund-collection-categories-super-admin', compact('categories'));
    }
    
    public function show($id)
    {
        $category = PaymentCategory::findOrFail($id);
        $view = auth()->user()->account_type_id == 1 
            ? 'collection-mgmt.view-category-super-admin' 
            : 'collection-mgmt.view-category-admin';
        
        return view($view, compact('category'));
    }
    

    public function edit($id)
    {
        $category = PaymentCategory::findOrFail($id);
        return view('collection-mgmt.edit-category-super-admin', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'hex_code' => 'required|string', // Validation for hex color
        ]);

        $category = PaymentCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'hex_code' => $request->hex_code,
        ]);

        $redirectRoute = auth()->user()->account_type_id == 1 
        ? 'manage.fund.collection.categories.superadmin' 
        : 'manage.fund.collection.categories.admin';

        return redirect()->route($redirectRoute)
                     ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = PaymentCategory::findOrFail($id);
        $category->delete();

        $redirectRoute = auth()->user()->account_type_id == 1 
        ? 'manage.fund.collection.categories.superadmin' 
        : 'manage.fund.collection.categories.admin';

        return redirect()->route($redirectRoute)
                     ->with('success', 'Category deleted successfully.');
    }

    public function manageCategoriesAdmin()
    {
        $categories = PaymentCategory::all(); // Fetch all categories from the database
        return view('collection-mgmt.admin', compact('categories')); // Adjust to your view name if necessary
    }
    
    public function createEntry()
    {
        $categories = PaymentCategory::all(); // Fetch all categories
        $users = User::all(); // Fetch all users
        $collectors = PaymentCollector::all(); // Fetch all collectors
        return view('collection-mgmt.add-entry-super-admin', compact('categories','users', 'collectors'));
    }




}
