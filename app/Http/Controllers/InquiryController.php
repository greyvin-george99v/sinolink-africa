<?php

namespace App\Http\Controllers;

use App\Mail\InquiryReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class InquiryController extends Controller {

    /**
     * Display the list of inquiries for the Admin.
     * Fixes: Call to undefined method index()
     */
    public function index() {
        // Fetch inquiries and join with users to see who referred them
        $inquiries = DB::table('inquiries')
            ->leftJoin('users', 'inquiries.affiliate_id', '=', 'users.id')
            ->select('inquiries.*', 'users.name as affiliate_name')
            ->orderBy('inquiries.created_at', 'desc')
            ->get();

        // Point to the view at resources/views/admin/inquiries.blade.php
        return view('admin.inquiries.inquiries', compact('inquiries'));
    }

    /**
     * Store a new inquiry and award points to affiliates.
     */
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

        // --- START AFFILIATE LOGIC ---
        $affiliateId = null;

        // Check if the visitor has a referral cookie set from the landing page
        if (Cookie::has('affiliate_ref')) {
            $refCode = Cookie::get('affiliate_ref');
            
            // Find the affiliate with this unique code
            $affiliate = DB::table('users')->where('referral_code', $refCode)->first();

            if ($affiliate) {
                $affiliateId = $affiliate->id;

                // Award 10 points to the affiliate for the successful lead
                DB::table('users')->where('id', $affiliateId)->increment('points', 10);
            }
        }
        // --- END AFFILIATE LOGIC ---

        // 2. Save into the "inquiries" table
        DB::table('inquiries')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'vehicle_type' => $request->vehicle_type,
            'message' => $request->message,
            'affiliate_id' => $affiliateId, // Link the inquiry to the affiliate
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Send Email Notification
        // We manually add the affiliate_id to the object so the email knows who sent it
        $emailData = (object) array_merge($validated, ['affiliate_id' => $affiliateId]);
        Mail::to('info@sinolink.africa')->send(new InquiryReceived($emailData));

        // 4. Success Response
        return back()->with('success', 'Thank you! Your inquiry has been sent.');
    }
}