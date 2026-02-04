<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Lead; // Added for cleaner code
use Illuminate\Support\Facades\Auth;

class AffiliateController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // 1. Get manual leads (Submissions via the Dashboard Modal)
        $myLeads = Lead::where('user_id', $user->id)->latest()->get();
        
        // 2. Get web inquiries (Submissions via Referral Link)
        $webInquiries = Inquiry::where('affiliate_id', $user->id)->latest()->get();
        
        // 3. Success Referrals (Only those marked 'sold')
        $totalLeads = $myLeads->where('status', 'sold')->count() + 
                      $webInquiries->where('status', 'sold')->count();

        // 4. Calculate Points (50 points per 'sold' lead)
        // This ensures points stay at 0 until the Admin changes status to 'sold'
        $totalPoints = $totalLeads * 10;

        return view('admin.affiliates.dashboard', compact(
            'myLeads', 
            'webInquiries', 
            'totalLeads', 
            'totalPoints'
        ));
    }
}