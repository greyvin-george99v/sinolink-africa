<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class AdminVehicleController extends Controller
{
    /**
     * Display a listing of the vehicles with Search support.
     */
    public function index(Request $request)
        {
            $query = Vehicle::query();

            // Only search the 'name' column since 'brand' does not exist in your database
            if ($request->filled('search')) {
                $searchTerm = $request->search;
                $query->where('name', 'LIKE', '%' . $searchTerm . '%');
            }

            // Use withQueryString() so the search result stays visible if you click next page
            $vehicles = $query->orderBy('id', 'asc')
                            ->paginate(20)
                            ->withQueryString();

            return view('admin.vehicles.index', compact('vehicles'));
        }

    public function create()
    {
        return view('admin.vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'year'  => 'required|string',
            'km'    => 'required|string',
            'fuel'  => 'required|string',
            'color' => 'nullable|string',
            'trans' => 'required|string',
            'desc'  => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $vehicle = new Vehicle();
        $this->saveVehicle($vehicle, $request);

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle added to catalogue!');
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'year'  => 'required|string',
            'km'    => 'required|string',
            'fuel'  => 'required|string',
            'trans' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $vehicle = Vehicle::findOrFail($id);

        // Update the sold status if provided in the request
        if ($request->has('is_sold')) {
            $vehicle->is_sold = $request->is_sold;
        }

        $this->saveVehicle($vehicle, $request);

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehicle updated successfully!');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        if (File::exists(public_path('images/' . $vehicle->image))) {
            File::delete(public_path('images/' . $vehicle->image));
        }

        $vehicle->delete();
        return back()->with('success', 'Vehicle removed from catalogue.');
    }

    public function markAsSold($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->is_sold = true; 
        // Rule: Now points can be calculated because admin marked it as sold
        $vehicle->save();

        return back()->with('success', 'Vehicle status updated to SOLD.');
    }

    private function saveVehicle($vehicle, $request)
    {
        $vehicle->name = $request->name;
        
        if (!$vehicle->exists || $vehicle->isDirty('name')) {
            $vehicle->slug = Str::slug($request->name) . '-' . rand(100, 999);
        }

        $vehicle->price = $request->price;
        $vehicle->year = $request->year;
        $vehicle->km = $request->km;
        $vehicle->fuel = $request->fuel;
        $vehicle->color = $request->color;
        $vehicle->trans = $request->trans;
        $vehicle->desc = $request->desc;
        
        if (!$vehicle->exists) {
            $vehicle->is_sold = false; // Initial rule: No points until marked sold
        }

        if ($request->hasFile('image')) {
            if ($vehicle->image && File::exists(public_path('images/' . $vehicle->image))) {
                File::delete(public_path('images/' . $vehicle->image));
            }

            $imageName = time() . '-' . Str::slug($request->name) . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $vehicle->image = $imageName;
        }

        $vehicle->save();
    }
}