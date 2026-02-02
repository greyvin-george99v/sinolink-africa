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
     * UPDATED: Added filtering by affiliate_id for the "View Leads" eye icon.
     */
    public function index(Request $request) {
        $query = DB::table('inquiries')
            ->leftJoin('users', 'inquiries.affiliate_id', '=', 'users.id')
            ->select('inquiries.*', 'users.name as affiliate_name');

        // If filtering by a specific affiliate from the Management page
        if ($request->has('affiliate_id')) {
            $query->where('inquiries.affiliate_id', $request->affiliate_id);
        }

        $inquiries = $query->orderBy('inquiries.created_at', 'desc')->get();

        return view('admin.inquiries.inquiries', compact('inquiries'));
    }

    /**
     * Store a new inquiry and award points to affiliates.
     * FIX: Check for 'active' status before awarding points.
     */
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'country' => 'required',
            'vehicle_type' => 'required',
            'message' => 'nullable|string',
        ]);

        $affiliateId = null;

        if (Cookie::has('sino_ref')) {
            $refCode = Cookie::get('sino_ref');
            // Check if affiliate exists AND is active
            $affiliate = DB::table('users')->where('referral_code', $refCode)->first();

            if ($affiliate && $affiliate->status === 'active') {
                $affiliateId = $affiliate->id;

                DB::transaction(function () use ($affiliateId, $request) {
                    // Award 10 points for the initial lead
                    DB::table('users')->where('id', $affiliateId)->increment('points', 10);

                    // Audit Trail: Log the lead points
                    DB::table('points_logs')->insert([
                        'user_id' => $affiliateId,
                        'points_earned' => 10,
                        'description' => "Referral lead: {$request->name}",
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                });
            }
        }

        // Save inquiry even if affiliate is blocked (we keep the lead, just no points)
        DB::table('inquiries')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'vehicle_type' => $request->vehicle_type,
            'message' => $request->message,
            'affiliate_id' => $affiliateId,
            'status' => 'pending', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $emailData = (object) [
            'name'         => $request->name,
            'phone'        => $request->phone,
            'email'        => $request->email,
            'country'      => $request->country,
            'vehicle_type' => $vehicle_type,
            'user_message' => $request->message,
            'affiliate_id' => $affiliateId,
        ];

        Mail::to('info@sinolink.africa')->send(new InquiryReceived($emailData));

        return back()->with('success', 'Thank you! Your inquiry has been sent.');
    }

    /**
     * NEW: Convert an inquiry to a sale and award high-value points.
     * FIX: Only award 500 points if the affiliate is currently 'active'.
     */
    public function convertToSale($id) {
        $inquiry = DB::table('inquiries')->where('id', $id)->first();

        if ($inquiry && $inquiry->affiliate_id && $inquiry->status !== 'sold') {
            
            // Fetch affiliate to check status
            $affiliate = DB::table('users')->where('id', $inquiry->affiliate_id)->first();

            if ($affiliate && $affiliate->status === 'active') {
                DB::transaction(function () use ($inquiry) {
                    // 1. Mark as sold
                    DB::table('inquiries')->where('id', $inquiry->id)->update([
                        'status' => 'sold',
                        'updated_at' => now()
                    ]);

                    // 2. Award 500 Bonus Points for the sale
                    DB::table('users')->where('id', $inquiry->affiliate_id)->increment('points', 500);

                    // 3. Log the big commission in the Audit Trail
                    DB::table('points_logs')->insert([
                        'user_id' => $inquiry->affiliate_id,
                        'points_earned' => 500,
                        'description' => "Sale Commission: Inquiry #{$inquiry->id} ({$inquiry->name})",
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                });

                return back()->with('success', 'Inquiry marked as SOLD. 500 points awarded!');
            } else {
                return back()->with('error', 'Affiliate is currently blocked. No points awarded.');
            }
        }

        return back()->with('error', 'Unable to process conversion.');
    }
}