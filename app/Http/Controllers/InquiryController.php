<?php

namespace App\Http\Controllers;

use App\Mail\InquiryReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller {

    public function index() {
    // This fetches all data from the inquiries table, newest first
    $inquiries = DB::table('inquiries')->orderBy('created_at', 'desc')->get();
    
    // This looks for the file we just made in resources/views/admin/
    return view('admin.inquiries', compact('inquiries'));
    }

public function exportCsv() {
    $fileName = 'sinolink_inquiries_' . date('Y-m-d') . '.csv';
    $inquiries = DB::table('inquiries')->get();

    $headers = array(
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$fileName",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    );

    $columns = array('Date', 'Name', 'Email', 'Phone', 'Country', 'Vehicle Type', 'Message');

    $callback = function() use($inquiries, $columns) {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach ($inquiries as $inquiry) {
            fputcsv($file, array(
                $inquiry->created_at,
                $inquiry->name,
                $inquiry->email,
                $inquiry->phone,
                $inquiry->country,
                $inquiry->vehicle_type,
                $inquiry->message
            ));
        }
        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
    }

    public function store(Request $request) {
        // 1. Precise Validation for your fields
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'country' => 'required',
            'vehicle_type' => 'required',
            'message' => 'nullable|string',
        ]);

        // 2. Save into the "inquiries" table
        DB::table('inquiries')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'country' => $request->country,
            'vehicle_type' => $request->vehicle_type,
            'message' => $request->message,
            'created_at' => now(),
        ]);

        $inquiry = (object) $validated; 
        Mail::to('info@sinolink.africa')->send(new InquiryReceived($inquiry));
        // 3. Send back to the form with success
        return back()->with('success', 'Thank you! Your inquiry has been sent.');
    }
}