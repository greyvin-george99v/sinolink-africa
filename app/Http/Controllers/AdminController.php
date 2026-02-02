<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function deleteAffiliate($id)
        {
            $user = User::findOrFail($id);

            DB::transaction(function () use ($user) {
                // 1. Unlink any inquiries so they don't block the deletion
                DB::table('inquiries')->where('affiliate_id', $user->id)->update(['affiliate_id' => null]);

                // 2. Delete the affiliate
                $user->delete();
            });

            return back()->with('success', 'Affiliate removed. Their leads have been preserved as general inquiries.');
        }
    
            public function toggleStatus($id) {
            $user = \App\Models\User::findOrFail($id);
            
            // Switch between active and blocked
            $user->status = ($user->status === 'active') ? 'blocked' : 'active';
            $user->save();

            return back()->with('success', "Affiliate {$user->name} is now {$user->status}.");
        }   
    // You can also move your affiliate list logic here later
    public function affiliates() {
        $affiliates = User::where('role', 'affiliate')->get();
        return view('admin.affiliates', compact('affiliates'));
    }
}