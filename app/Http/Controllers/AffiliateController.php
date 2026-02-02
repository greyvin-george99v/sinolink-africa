<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;

class AffiliateController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Count how many inquiries have this user's ID linked to them
        $totalLeads = Inquiry::where('affiliate_id', $user->id)->count();

        return view('affiliates.dashboard', compact('user', 'totalLeads'));
    }
}
