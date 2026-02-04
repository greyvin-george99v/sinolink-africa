<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth; // Required for Auth::id()

class LeadController extends Controller
{
    public function index() {
        $leads = Lead::with('user')->latest()->get();
        return view('admin.leads.index', compact('leads'));
    }

    // ADD THIS METHOD
    public function store(Request $request) {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_email' => 'nullable|email|max:255',
            'vehicle_interest' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
        
        ]);

        Lead::create([
            'user_id' => Auth::id(), // ID of the logged-in affiliate
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'vehicle_interest' => $request->vehicle_interest,
            'country' => $request->country,
            'status' => 'en attente',
        ]);

        return redirect('/dashboard')->with('success', 'Customer lead submitted successfully!');
    }

    public function markAsSold($id) {
        $lead = Lead::findOrFail($id);
        
        if ($lead->status === 'en attente') {
            DB::transaction(function () use ($lead) {
                $lead->update(['status' => 'vendu']);
                $lead->user->increment('points', 10);
            });
            return back()->with('success', 'Sale confirmed! 10 points awarded.');
        }
        return back()->with('error', 'Action not possible.');
    }
}