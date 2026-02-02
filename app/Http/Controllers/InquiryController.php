<?php

namespace App\Http\Controllers;

use App\Mail\InquiryReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie; // Add this

class InquiryController extends Controller {

    // ... (index and exportCsv stay the same)

    public function store(Request $request) {
        // 1. Precise Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'country' => 'required',
            'vehicle_type' => 'required',
            'message' => 'nullable|string',
        ]);

        // --- START NEW AFFILIATE LOGIC ---
        $affiliateId = null;

        // Check if the visitor has a referral cookie
        if (Cookie::has('affiliate_ref')) {
            $refCode = Cookie::get('affiliate_ref');
            
            // Find the affiliate with this unique code
            $affiliate = DB::table('users')->where('referral_code', $refCode)->first();

            if ($affiliate) {
                $affiliateId = $affiliate->id;

                // Award 10 points to the affiliate
                DB::table('users')->where('id', $affiliateId)->increment('points', 10);
            }
        }
        // --- END NEW AFFILIATE LOGIC ---

        // 2. Save into the "inquiries" table (including the affiliate_id)
        DB::table('inquiries')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'vehicle_type' => $request->vehicle_type,
            'message' => $request->message,
            'affiliate_id' => $affiliateId, // Link the inquiry to the affiliate
            'created_at' => now(),
        ]);

        $inquiry = (object) $validated; 
        Mail::to('info@sinolink.africa')->send(new InquiryReceived($inquiry));

        // 3. Send back to the form with success
        return back()->with('success', 'Thank you! Your inquiry has been sent.');
    }
}