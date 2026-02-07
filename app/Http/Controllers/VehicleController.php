<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Admin Index: Handles the "Manage Catalogue" view with Search
     */
    public function index(Request $request)
{
    $query = Vehicle::query();

    // The key fix: Search by name OR brand to be more flexible
    if ($request->filled('search')) {
        $searchTerm = $request->search;
        $query->where(function($q) use ($searchTerm) {
            $q->where('name', 'LIKE', '%' . $searchTerm . '%')
              ->orWhere('brand', 'LIKE', '%' . $searchTerm . '%');
        });
    }

    // Default order: ID ASC (so car #1 is always first)
    // withQueryString() is CRITICAL for pagination to work with search
    $vehicles = $query->orderBy('id', 'asc')
                      ->paginate(20)
                      ->withQueryString();

    return view('admin.vehicles.index', compact('vehicles'));
}

    /**
     * Public Catalogue: All 61 vehicles visible with Green SOLD badges via Blade
     */
    public function catalogue(Request $request)
    {
        $query = Vehicle::query();

        // 1. APPLY FILTERS (Search & Brand)
        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->filled('brand')) {
            $query->where('name', 'LIKE', '%' . $request->brand . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // 2. APPLY SORTING 
        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'price_asc': $query->orderBy('price', 'asc'); break;
                case 'price_desc': $query->orderBy('price', 'desc'); break;
                case 'year_new': $query->orderBy('year', 'desc'); break;
                case 'year_old': $query->orderBy('year', 'asc'); break;
                default: $query->orderBy('id', 'asc');
            }
        } else {
            // Ensures Toyota Corolla (ID 1) is always first
            $query->orderBy('id', 'asc');
        }

        // 3. PAGINATION (Matches Admin count of 60-61 total results)
        $vehicles = $query->paginate(20)->withQueryString();

        return view('catalogue', compact('vehicles'));
    }

    public function show($slug, Request $request)
    {
        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }

        $vehicle = Vehicle::where('slug', $slug)->firstOrFail();

        return view('vehicle-details', compact('vehicle'));
    }

    public function showGenerator()
    {
        // Affiliate list: All 61 vehicles in ID order
        $vehicles = Vehicle::orderBy('id', 'asc')->get(); 
        return view('affiliate-program', compact('vehicles'));
    }
}