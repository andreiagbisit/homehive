<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentCollector;


class PaymentCollectorController extends Controller
{
    public function store(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'collector_gcash_number' => 'required|string|max:15',
            'gcash_qr_code' => 'required|image|mimes:jpg,png|max:20480', // Max 20MB
        ]);

        // Create a new collector entry
        $collector = new PaymentCollector();
        $collector->name = $request->name;
        $collector->collector_gcash_number = $request->collector_gcash_number;

        // Check if a QR code file was uploaded
        if ($request->hasFile('gcash_qr_code')) {
            // Store the file in Azure Blob Storage under 'gcash-collector-qr' directory
            $qrCodePath = $request->file('gcash_qr_code')->store('gcash-collector-qr', 'azure');
            $collector->gcash_qr_code_path = $qrCodePath; // Save the file path in the database
        }

        $collector->save();

        // Redirect to a relevant page with a success message
        // Redirect based on user role
        if (auth()->user()->account_type_id == 1) { // Superadmin
            return redirect()->route('collection.mgmt.manage.collectors.superadmin')
                            ->with('success', 'GCash payment collector added successfully.');
        } else {
            return redirect()->route('collection.mgmt.manage.collectors.admin')
                            ->with('success', 'GCash payment collector added successfully.');
    }
    }

    public function update(Request $request, $id)
    {
        // Validate the inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'collector_gcash_number' => 'required|string|max:15',
            'gcash_qr_code' => 'required|image|mimes:jpg,png|max:20480', // Max 20MB
        ]);

        // Find and update the collector entry
        $collector = PaymentCollector::findOrFail($id);
        $collector->name = $request->name;
        $collector->collector_gcash_number = $request->collector_gcash_number;

        // Handle QR code upload
        if ($request->hasFile('gcash_qr_code')) {
            $qrCodePath = $request->file('gcash_qr_code')->store('gcash-collector-qr', 'azure');
            $collector->gcash_qr_code_path = $qrCodePath; // Update the file path in the database
        }

        $collector->save();

        // Redirect based on user role
        if (auth()->user()->account_type_id == 1) { // Superadmin
            return redirect()->route('collection.mgmt.manage.collectors.superadmin')->with('success', 'GCash payment collector information updated successfully.');
        } else {
            return redirect()->route('collection.mgmt.manage.collectors.admin')->with('success', 'GCash payment collector information updated successfully.');
        }
    }

    public function manageCollectors()
    {
        $collectors = PaymentCollector::all(); // Fetch all collectors
        return view('collection-mgmt.manage-collectors-super-admin', compact('collectors'));
    }

    public function addCollectorAdmin()
    {
        $view = auth()->user()->account_type_id == 1 
        ? 'collection-mgmt.add-collector-super-admin' 
        : 'collection-mgmt.add-collector-admin';
    
        return view($view);
    }

    public function manageCollectorsAdmin()
    {
        $collectors = PaymentCollector::all();
        return view('collection-mgmt.manage-collectors-super-admin', compact('collectors'));
    }

    public function editCollector($id) {
        $collector = PaymentCollector::findOrFail($id);
        return view('collection-mgmt.edit-collector-super-admin', compact('collector'));

        $view = auth()->user()->account_type_id == 1 
        ? 'collection-mgmt.edit-collector-super-admin' 
        : 'collection-mgmt.edit-collector-admin';
    
        return view($view, compact('collector'));
    }
    
    public function show($id)
    {
        $collector = PaymentCollector::findOrFail($id); // Retrieve the collector by ID

        $view = auth()->user()->account_type_id == 1 
        ? 'collection-mgmt.view-collector-super-admin' 
        : 'collection-mgmt.view-collector-admin';
    
        return view($view, compact('collector'));
    }

    public function destroy($id)
    {
        $collector = PaymentCollector::findOrFail($id);
        $collector->delete();
        if (auth()->user()->account_type_id == 2) { // Assuming 2 is admin
            return redirect()->route('collection.mgmt.manage.collectors.admin')->with('success', 'GCash payment collector removed successfully.');
        } else {
            return redirect()->route('collection.mgmt.manage.collectors.superadmin')->with('success', 'GCash payment collector removed successfully.');
        }

    }

}
