<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment; 
use App\Models\PaymentCategory;
use App\Models\User;
use app\Models\PaymentCollector;
use App\Models\PaymentMode;
use App\Models\PaymentStatus;

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
        return redirect()->route('collection.mgmt.superadmin')->with('success', 'Payment entry added successfully.');
    }

    public function index()
    {
        // Fetch payments with related data for display
        
        $payments = Payment::with(['category', 'user', 'collector', 'paymentStatus', 'paymentMode'])->get();

        return view('collection-mgmt.super-admin', compact('payments'));
    }

    public function show($id)
    {
        $payment = Payment::with(['category', 'user', 'collector', 'paymentMode', 'paymentStatus'])
                        ->findOrFail($id);

        return view('collection-mgmt.view-entry-super-admin', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::with(['category', 'user', 'collector', 'paymentMode', 'paymentStatus'])->findOrFail($id);
        $categories = PaymentCategory::all();
        $users = User::all();
        $collectors = PaymentCollector::all();
        $paymentModes = PaymentMode::all();
        $status = PaymentStatus::all();

        return view('collection-mgmt.edit-entry-super-admin', compact('payment', 'categories', 'users', 'collectors', 'paymentModes', 'status'));
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

        return redirect()->route('collection.mgmt.superadmin')->with('success', 'Payment entry updated successfully.');
    }

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete(); // This will perform a soft delete if soft delete trait is enabled on the model

        return redirect()->route('collection.mgmt.superadmin')->with('success', 'Payment entry deleted successfully.');
    }


}
