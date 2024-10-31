<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment; 
use App\Models\PaymentCategory;
use App\Models\User;
use App\Models\PaymentCollector;
use App\Models\PaymentMode;
use App\Models\PaymentStatus;
use Illuminate\Support\Facades\Storage;




class PaymentController extends Controller
{
    // Store the payment entry
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:payment_category,id',
            'fee' => 'required|numeric',
            'status_id' => 'required|exists:payment_status,id',
            'pay_date' => 'required|date',
            'mode_id' => 'required|exists:payment_mode,id',
            'collector_id' => 'required|exists:payment_collector,id',
            'month' => 'required|string',
            'year' => 'required|integer',
        ]);

        // Create a new payment entry
        Payment::create($validatedData);

        // Redirect back with a success message
        if (auth()->user()->account_type_id == 1) { // Super Admin
            return redirect()->route('collection.mgmt.superadmin')->with('success', 'Payment entry added successfully.');
        } else { // Admin
            return redirect()->route('collection.mgmt.admin')->with('success', 'Payment entry added successfully.');
        }
    }

    public function index()
    {
        // Fetch payments with related data for display
        
        $payments = Payment::with(['category', 'user', 'collector', 'paymentStatus', 'paymentMode'])->get();

        if (auth()->user()->account_type_id == 1) {
            return view('collection-mgmt.super-admin', compact('payments'));
        } else {
            return view('collection-mgmt.admin', compact('payments'));
        }
    }

    public function show($id)
    {
        $payment = Payment::with(['category', 'user', 'collector', 'paymentMode', 'paymentStatus'])
                        ->findOrFail($id);

                        $view = auth()->user()->account_type_id == 1 
                        ? 'collection-mgmt.view-entry-super-admin' 
                        : 'collection-mgmt.view-entry-admin';
                
                    return view($view, compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::with(['category', 'user', 'collector', 'paymentMode', 'paymentStatus'])->findOrFail($id);
        $categories = PaymentCategory::all();
        $users = User::all();
        $collectors = PaymentCollector::all();
        $paymentModes = PaymentMode::all();
        $status = PaymentStatus::all();
    
        $view = auth()->user()->account_type_id == 1 
            ? 'collection-mgmt.edit-entry-super-admin' 
            : 'collection-mgmt.edit-entry-admin';
        
        return view($view, compact('payment', 'categories', 'users', 'collectors', 'paymentModes', 'status'));
    }
    

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|exists:payment_category,id',
            'user_id' => 'required|exists:users,id',
            'collector_id' => 'required|exists:payment_collector,id',
            'fee' => 'required|numeric',
            'status_id' => 'required|exists:payment_status,id',
            'pay_date' => 'required|date',
            'mode_id' => 'required|exists:payment_mode,id',
            'month' => 'required|string',
            'year' => 'required|integer',
        ]);

        $payment->update($request->only([
            'title', 'category_id', 'user_id', 'collector_id', 'fee', 'status_id', 'pay_date', 'mode_id', 'month', 'year'
        ]));

            // Conditional redirect based on user role
        if (auth()->user()->account_type_id == 1) { // Super Admin
            return redirect()->route('collection.mgmt.superadmin')->with('success', 'Payment entry updated successfully.');
        } else { // Admin
            return redirect()->route('collection.mgmt.admin')->with('success', 'Payment entry updated successfully.');
        }
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete(); // This will perform a soft delete if soft delete trait is enabled on the model
    
        $redirectRoute = auth()->user()->account_type_id == 1 
            ? 'collection.mgmt.superadmin' 
            : 'collection.mgmt.admin';
    
        return redirect()->route($redirectRoute)->with('success', 'Payment entry deleted successfully.');
    }

    public function userPayments()
    {
        // Get the logged-in user's ID
        $userId = auth()->id();

        // Fetch all payment entries related to this user
        $payments = Payment::where('user_id', $userId)
                        ->with(['category', 'paymentStatus', 'paymentMode'])
                        ->get();

        return view('payment-mgmt.user', compact('payments'));
    }

    public function managePayment($id)
    {
        $payment = Payment::with(['category', 'paymentStatus', 'paymentMode'])->findOrFail($id);
        $collectors = PaymentCollector::all(); // Fetch all collectors for the dropdown
    
        return view('payment-mgmt.manage-payment', compact('payment', 'collectors'));
    }
    


    public function submitPayment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        // Validate the form data
        $request->validate([
            'reference_no' => 'nullable|string|max:255',
            'receipt_img' => 'nullable|file|mimes:jpg,png|max:2048' // max file size of 2MB
        ]);

        // Update reference number
        $payment->reference_no = $request->input('reference_no');

        // Handle file upload to Azure Blob Storage
        if ($request->hasFile('receipt_img')) {
            $file = $request->file('receipt_img');
            $filename = 'user-gcash-receipt-payments/' . uniqid() . '.' . $file->getClientOriginalExtension();
            
            // Store the file in Azure
            $path = Storage::disk('azure')->put($filename, file_get_contents($file));
            
            if ($path) {
                $payment->receipt_img = $filename;
            }
        }

        // Save the payment record
        $payment->save();

        return redirect()->route('payment.mgmt')->with('success', 'Payment submitted successfully.');
    }



}
