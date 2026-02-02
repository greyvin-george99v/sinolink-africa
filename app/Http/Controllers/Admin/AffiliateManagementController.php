<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class AffiliateManagementController extends Controller
{
    public function index()
    {
        // Fetch all users who are affiliates, ordered by their points
        $affiliates = User::where('role', 'affiliate')
                          ->orderBy('points', 'desc')
                          ->get();

        return view('admin.affiliates.index', compact('affiliates'));
    }

    
}
